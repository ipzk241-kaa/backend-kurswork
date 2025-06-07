<h1>Редагувати новину</h1>

<form action="/news/update/<?= $news['id'] ?>" method="POST" enctype="multipart/form-data" class="news-form">
    <label>Заголовок:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($news['title']) ?>" required><br><br>

    <label>Текст:</label><br>
    <textarea name="content" rows="6" required><?= htmlspecialchars($news['content']) ?></textarea><br><br>

    <label>Дата:</label><br>
    <input type="date" name="date" value="<?= $news['date'] ?>"><br><br>

    <label>Додати зображення:</label><br>
    <input type="file" name="images[]" multiple><br><br>

    <button type="submit" class="btn-submit">Оновити</button>
</form>

<?php if ($images): ?>
    <h3>Поточні зображення:</h3>
    <div class="current-images">
        <?php foreach ($images as $img): ?>
            <div class="current-image-item">
                <img src="/assets/news/<?= htmlspecialchars($img['path']) ?>" alt="зображення" class="news-show-img">
                <a href="/news/delete-image/<?= $img['id'] ?>" onclick="return confirm('Видалити зображення?')" class="delete-link">🗑 Видалити</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
