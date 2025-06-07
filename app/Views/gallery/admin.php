<h2 class="section-title">Адмінка Галереї</h2>
<a href="/gallery/create" class="btn">➕ Додати зображення</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Зображення</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($images as $img): ?>
            <tr>
                <td><?= $img['id'] ?></td>
                <td><?= htmlspecialchars($img['title']) ?></td>
                <td><img src="/assets/img/<?= $img['image_path'] ?>" class="table-img"></td>
                <td>
                    <a href="/gallery/edit/<?= $img['id'] ?>">✏️</a>
                    <a href="/gallery/delete/<?= $img['id'] ?>" onclick="return confirm('Видалити?')">🗑️</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
