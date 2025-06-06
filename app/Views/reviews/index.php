<h2>Відгуки</h2>

<a href="/reviews/create">Залишити відгук</a>

<?php foreach ($reviews as $review): ?>
    <div>
        <strong><?= htmlspecialchars($review['user_name']) ?></strong><br>
        <small><?= $review['created_at'] ?></small>
        <p><?= nl2br(htmlspecialchars($review['text'])) ?></p>
        <?php if ($review['image']): ?>
            <img src="/assets/reviews/<?= $review['image'] ?>" width="150" alt="зображення відгуку"><br>
            <?php endif; ?>
        <hr>
    </div>
<?php endforeach; ?>
