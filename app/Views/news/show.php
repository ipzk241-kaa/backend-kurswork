<h1><?= htmlspecialchars($news['title']) ?></h1>
<p><em><?= $news['date'] ?></em></p>
<p><?= nl2br(htmlspecialchars($news['content'])) ?></p>

<?php if ($images): ?>
    <h3>Зображення:</h3>
    <?php foreach ($images as $img): ?>
        <img src="/assets/news/<?= $img['path'] ?>" alt="Зображення" style="max-width: 300px; margin: 10px;">
    <?php endforeach; ?>
<?php endif; ?>
