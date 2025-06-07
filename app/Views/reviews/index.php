<?php $title = 'Відгуки'; ?>

<section class="container">
    <h2>Відгуки</h2>
    <a href="/reviews/create" class="btn">Залишити відгук</a>

    <?php foreach ($reviews as $review): ?>
        <div class="review-card">
            <div class="review-header">
                <strong><?= htmlspecialchars($review['user_name']) ?></strong>
                <small><?= $review['created_at'] ?></small>
            </div>
            <p><?= nl2br(htmlspecialchars($review['text'])) ?></p>
            <?php if ($review['image']): ?>
                <img src="/assets/reviews/<?= $review['image'] ?>" alt="зображення відгуку">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>
