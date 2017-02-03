<?php if(empty($changed)): ?>
    <h1>Няма променени цени</h1>

<?php else: ?>
    <hr>
    <?php foreach ($changed as $item): ?>
        <p><a href="http://spd.gavadinov.com/products/<?= $item['id'] ?>"><?= $item['name'] ?></a></p>
        <p>Стара цена: <?= $item['old'] ?> | Нова цена: <?= $item['new'] ?></p>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>
