<h2>Маршрути</h2>

<?php foreach ($routes as $route): ?>
    <div class="route-card">
        <h3 class="route-title"><?= htmlspecialchars($route['title']) ?></h3>
        <?php if ($route['image']): ?>
            <img src="/assets/routes/<?= $route['image'] ?>" alt="" class="route-img">
        <?php endif; ?>
        <p class="route-desc"><?= nl2br(htmlspecialchars($route['description'])) ?></p>
        <p>⏳ Тривалість: <?= htmlspecialchars($route['duration']) ?></p>
        <p>💰 Ціна: <?= htmlspecialchars($route['price']) ?> грн</p>
    </div>
<?php endforeach; ?>
