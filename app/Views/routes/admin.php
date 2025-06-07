<h2>Адмінка маршрутів</h2>
<a href="/routes/create" class="btn-primary">+ Додати маршрут</a>

<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>Назва</th>
                <th>Ціна</th>
                <th>Тривалість</th>
                <th>Зображення</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routes as $route): ?>
                <tr>
                    <td><?= htmlspecialchars($route['title']) ?></td>
                    <td><?= htmlspecialchars($route['price']) ?> грн</td>
                    <td><?= htmlspecialchars($route['duration']) ?></td>
                    <td>
                        <?php if ($route['image']): ?>
                            <img src="/assets/routes/<?= $route['image'] ?>" width="120">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/routes/edit/<?= $route['id'] ?>">✏️</a>
                        <a href="/routes/delete/<?= $route['id'] ?>" onclick="return confirm('Видалити?')">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
