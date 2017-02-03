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
        <li role="presentation" class="active"><a href="/">Добавяне</a></li>
        <li role="presentation"><a href="/products">Продукти</a></li>
    </ul>

    <h3>Добавяне на продукт:</h3>
    <form action="products" method="POST">
        <div class="form-group">
            <label for="name">Име</label>
            <input type="text" class="form-control" id="name" placeholder="Име" name="name" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" placeholder="URL" name="url" required>
        </div>
        <button type="submit" class="btn btn-primary">Запиши</button>
    </form>
    <hr>
    <h3>Смяна на email:</h3>
    <form action="updateEmail" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $email ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Запиши</button>
    </form>

    <hr>
    <form action='/crawl' method="GET">
        <button type="submit" class="btn btn-danger">REFRESH</button>
    </form>
</div>
</body>
</html>
