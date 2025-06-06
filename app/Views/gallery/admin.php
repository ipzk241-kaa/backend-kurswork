<h2>Адмінка Галерея</h2>
<a href="/gallery/create">➕ Додати зображення</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Зображення</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($images as $img): ?>
        <tr>
            <td><?= $img['id'] ?></td>
            <td><?= htmlspecialchars($img['title']) ?></td>
            <td><img src="/assets/img/<?= $img['image_path'] ?>" width="100"></td>
            <td>
                <a href="/gallery/edit/<?= $img['id'] ?>">✏️</a>
                <a href="/gallery/delete/<?= $img['id'] ?>" onclick="return confirm('Видалити?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>