<h1>Сторінка маршрутів</h1>

<?php if (!empty($routes)): ?>
    <ul>
        <?php foreach($routes as $route): ?>
            <li><?= htmlspecialchars($route['title']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Маршрути відсутні.</p>
<?php endif; ?>
