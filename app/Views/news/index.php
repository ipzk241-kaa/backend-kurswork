<h1>Новини</h1>

<?php if (\App\Core\Auth::isAdmin()): ?>
    <a href="/news/create">Додати новину</a>
<?php endif; ?>

<ul>
    <?php foreach ($newsList as $news): ?>
        <li>
            <a href="/news/show/<?= $news['id'] ?>"><?= htmlspecialchars($news['title']) ?></a>
            <?php if (\App\Core\Auth::isAdmin()): ?>
                | <a href="/news/edit/<?= $news['id'] ?>">Редагувати</a>
                | <a href="/news/delete/<?= $news['id'] ?>" onclick="return confirm('Ви впевнені?')">Видалити</a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
