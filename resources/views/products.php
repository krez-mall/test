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

    <table class="table table-hover" style="cursor: pointer;">
        <tr>
            <th>ID</th>
            <th>Име</th>
            <th>URL</th>
        </tr>
        <?php foreach ($items AS $item): ?>
            <tr onclick="window.location.replace('/products/<?=$item->id ?>')">
                <td><?= $item->id ?></td>
                <td><?= $item->name ?></td>
                <td><?= $item->url ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
