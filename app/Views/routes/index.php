<h2>Маршрути</h2>

<?php foreach ($routes as $route): ?>
    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
        <h3><?= htmlspecialchars($route['title']) ?></h3>
        <?php if ($route['image']): ?>
            <img src="/assets/routes/<?= $route['image'] ?>" alt="" style="max-width: 300px;"><br>
        <?php endif; ?>
        <p><?= nl2br(htmlspecialchars($route['description'])) ?></p>
        <p>⏳ Тривалість: <?= htmlspecialchars($route['duration']) ?></p>
        <p>💰 Ціна: <?= htmlspecialchars($route['price']) ?> грн</p>
    </div>
<?php endforeach; ?>
