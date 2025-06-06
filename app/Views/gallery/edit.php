<h2><?= $title ?></h2>

<form method="POST" action="/gallery/update/<?= $item['id'] ?>" enctype="multipart/form-data">
    <label>Назва:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($item['title']) ?>" required><br><br>

    <label>Поточне зображення:</label><br>
    <img src="/assets/img/<?= htmlspecialchars($item['image_path']) ?>" style="max-width: 200px;"><br><br>

    <label>Нове зображення (файл):</label><br>
    <input type="file" name="image_file"><br><br>

    <label>Або новий URL зображення:</label><br>
    <input type="text" name="image_url"><br><br>

    <button type="submit">Оновити</button>
</form>
