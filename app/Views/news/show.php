<h1><?= htmlspecialchars($news['title']) ?></h1>
<?php if (\App\Core\Auth::isAdmin()): ?>
    <p>
        <a href="/news/edit/<?= $news['id'] ?>">✏️ Редагувати</a> |
        <a href="/news/delete/<?= $news['id'] ?>" onclick="return confirm('Видалити новину?')">🗑️ Видалити</a>
    </p>
<?php endif; ?>
<p class="news-date"><em><?= $news['date'] ?></em></p>
<div class="news-full-content">
    <div class="news-images">
        <?php if ($images): ?>
            <?php foreach ($images as $img): ?>
                <img src="/assets/news/<?= htmlspecialchars($img['path']) ?>" alt="Зображення" class="news-show-img">
            <?php endforeach; ?>
        <?php else: ?>
            <div class="news-img-placeholder"> </div>
        <?php endif; ?>
    </div>
    <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
</div>
