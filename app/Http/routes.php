<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Item;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;

$app->get('/', function() use ($app) {
    $data = [
        'email' => file_get_contents(__DIR__ . '/../email')
    ];
    return view('add', $data);
});

$app->post('/updateEmail', function() use ($app) {
    /** @var Request $request */
    $request = app(Request::class);
    $email = $request->input('email');
    if ($email) {
        file_put_contents(__DIR__ . '/../email', $email);
    }

    return redirect('/');
});

$app->get('/products', function() use ($app) {
    $data = [
        'items' => Item::orderBy('updated_at', 'DESC')->get()
    ];
    return view('products', $data);
});

$app->get('/products/{id}', function($id) use ($app) {
    $data = [
        'item' => Item::find($id),
        'prices' => Price::whereItemId($id)->orderBy('id', 'DESC')->get(),
    ];

    return view('product', $data);
});

$app->post('/products', function() use ($app) {
    /** @var Request $request */
    $request = app(Request::class);

    $name = $request->input('name');
    $url = $request->input('url');

    if ($name && $url) {
        $item = new Item();
        $item->name = $name;
        $item->url = $url;

        $item->save();
    }

    return redirect('/products');
});

$app->post('/remove/{id}', function($id) use ($app) {
    Item::whereId($id)->delete();
    Price::whereItemId($id)->delete();

    return redirect('/products');
});

$app->get('/crawl', function() use ($app) {
    require_once __DIR__ . '/../simple_html_dom.php';
    $items = Item::all();
    $changed = [];

    foreach ($items as $item) {
        $html = file_get_html($item->url);
        $currentPrice = $html->find('.pdpPrice > span', 1)->innertext;

        $lastPrice = '.';

        $lastRow = Price::whereItemId($item->id)->orderBy('id', 'desc')->first();
        if (!empty($lastRow)) {
            $lastPrice = $lastRow->price;
        }

        if ($lastPrice !== $currentPrice) {
            $newPrice = new Price();
            $newPrice->item_id = $item->id;
            $newPrice->price = $currentPrice;

            $newPrice->save();

            $item->touch();

            $changed[] = [
                'old' => $lastPrice,
                'new' => $currentPrice,
                'name' => $item->name,
                'id' => $item->id,
            ];
        }
    }

    $email = file_get_contents(__DIR__ . '/../email');
    if ($email) {
        Mail::send('email', ['changed' => $changed], function (Message $m) use ($email) {
            $m->to($email)->from('crawler@gavadinov.com')->subject('Променени продукти');
        });
    }

    return redirect('/products');
});

