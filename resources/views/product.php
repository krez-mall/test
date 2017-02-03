<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sports Direct Crawler</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="/">Добавяне</a></li>
        <li role="presentation" class="active"><a href="/products">Продукти</a></li>
    </ul>

    <h2><?= $item->name ?> - <a href="<?= $item->url ?>" target="_blank"><?= $item->url ?></a></h2>

    <table class="table table-hover">
        <tr>
            <th>Дата</th>
            <th>Цена</th>
        </tr>
        <?php foreach ($prices AS $price): ?>
            <tr>
                <td><?= $price->created_at->format('d-m-Y') ?></td>
                <td><?= $price->price ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action='/remove/<?=$item->id ?>' method="POST">
        <button type="submit" class="btn btn-danger">Премахни</button>
    </form>
</div>
</body>
</html>
