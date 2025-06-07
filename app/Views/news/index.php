<h1>Новини</h1>

<?php if (\App\Core\Auth::isAdmin()): ?>
    <a href="/news/create" class="btn-create-news">➕ Додати новину</a>
<?php endif; ?>

<div class="news-list">
    <?php foreach ($newsList as $news): ?>
        <a href="/news/show/<?= $news['id'] ?>" class="news-card">
            <?php if (!empty($news['images']) && count($news['images']) > 0): ?>
                <img src="/assets/news/<?= htmlspecialchars($news['images'][0]['path']) ?>" alt="" class="news-img">
            <?php else: ?>
                <div class="news-img-placeholder"> </div>
            <?php endif; ?>
            <div class="news-content">
                <h3><?= htmlspecialchars($news['title']) ?></h3>
                <p><?= htmlspecialchars(mb_strimwidth($news['content'], 0, 120, '...')) ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>
