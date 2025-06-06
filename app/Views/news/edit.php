<h1>Редагувати новину</h1>
<form action="/news/update/<?= $news['id'] ?>" method="POST" enctype="multipart/form-data">
    <label>Заголовок:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($news['title']) ?>" required><br><br>

    <label>Текст:</label><br>
    <textarea name="content" rows="6" required><?= htmlspecialchars($news['content']) ?></textarea><br><br>

    <label>Дата:</label><br>
    <input type="date" name="date" value="<?= $news['date'] ?>"><br><br>

    <label>Додати зображення:</label><br>
    <input type="file" name="images[]" multiple><br><br>

    <button type="submit">Оновити</button>
</form>

<?php if ($images): ?>
    <h3>Поточні зображення:</h3>
    <?php foreach ($images as $img): ?>
        <div style="margin-bottom: 10px;">
            <img src="/assets/news/<?= $img['path'] ?>" style="max-width: 200px;">
            <a href="/news/delete-image/<?= $img['id'] ?>" onclick="return confirm('Видалити зображення?')">🗑 Видалити</a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
