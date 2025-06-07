<?php $title = 'Адмін - Відгуки'; ?>

<section class="container">
    <h2>Адмін - Відгуки</h2>

    <?php foreach ($reviews as $review): ?>
        <div class="review-card admin-review">
            <div class="review-header">
                <strong><?= htmlspecialchars($review['user_name']) ?></strong>
                <small><?= $review['created_at'] ?> | <?= $review['approved'] ? '✅' : '⛔' ?></small>
            </div>
            <p><?= nl2br(htmlspecialchars($review['text'])) ?></p>
            <?php if ($review['image']): ?>
                <img src="/assets/reviews/<?= $review['image'] ?>" alt="зображення відгуку" class="review-image">
            <?php endif; ?>
            <div class="admin-actions">
                <?php if (!$review['approved']): ?>
                    <a href="/reviews/approve/<?= $review['id'] ?>" class="btn">✅ Схвалити</a>
                <?php endif; ?>
                <a href="/reviews/edit/<?= $review['id'] ?>" class="btn">✏️ Редагувати</a>
                <a href="/reviews/delete/<?= $review['id'] ?>" onclick="return confirm('Видалити?')" class="btn danger">🗑️ Видалити</a>
            </div>
        </div>
    <?php endforeach; ?>
</section>
