<h2>Адмінка маршрутів</h2>
<a href="/routes/create">+ Додати маршрут</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Назва</th>
        <th>Ціна</th>
        <th>Тривалість</th>
        <th>Зображення</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($routes as $route): ?>
        <tr>
            <td><?= htmlspecialchars($route['title']) ?></td>
            <td><?= htmlspecialchars($route['price']) ?> грн</td>
            <td><?= htmlspecialchars($route['duration']) ?></td>
            <td>
                <?php if ($route['image']): ?>
                    <img src="<?= htmlspecialchars($route['image']) ?>" style="height: 50px;">
                <?php endif; ?>
            </td>
            <td>
                <a href="/routes/edit/<?= $route['id'] ?>">✏️</a>
                <a href="/routes/delete/<?= $route['id'] ?>" onclick="return confirm('Видалити?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
