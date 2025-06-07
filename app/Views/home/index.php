<?php $title = 'Головна'; ?>

<section class="home-hero">
    <h1 class="hero-title">Ласкаво просимо на TravelGuide!</h1>
    <p class="hero-subtitle">
        Досліджуйте найцікавіші маршрути, діліться враженнями та знаходьте нові пригоди разом із нами.
    </p>
    <a href="/routes" class="btn-primary">Переглянути маршрути</a>
</section>

<section class="container about-section">
    <h2>Про нас</h2>
    <p>
        TravelGuide — це команда ентузіастів, що прагне зробити ваші подорожі незабутніми. 
        Ми створюємо унікальні маршрути, пропонуємо фото та поради від досвідчених мандрівників, 
        а також ділимося актуальними новинами туристичного світу.
    </p>
</section>

<section class="container latest-reviews">
    <h2>Останні відгуки</h2>

    <?php foreach (array_slice($reviews, 0, 3) as $review): ?>
        <div class="review-card">
            <div class="review-header">
                <strong><?= htmlspecialchars($review['user_name']) ?></strong>
                <small><?= $review['created_at'] ?></small>
            </div>
            <p><?= nl2br(htmlspecialchars($review['text'])) ?></p>
            <?php if ($review['image']): ?>
                <img src="/assets/reviews/<?= $review['image'] ?>" alt="зображення відгуку" class="review-image">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div class="review-actions">
        <a href="/reviews" class="btn">Переглянути всі відгуки</a>

        <?php if (!empty($_SESSION['user'])): ?>
            <a href="/reviews/create" class="btn">Залишити відгук</a>
        <?php endif; ?>
    </div>
</section>