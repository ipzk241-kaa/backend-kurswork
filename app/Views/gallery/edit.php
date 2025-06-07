<h2 class="section-title"><?= $title ?></h2>

<form method="POST" action="/gallery/update/<?= $item['id'] ?>" enctype="multipart/form-data" class="form">
    <label>Назва:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($item['title']) ?>" required>

    <label>Поточне зображення:</label><br>
    <img src="/assets/img/<?= htmlspecialchars($item['image_path']) ?>" class="preview-img"><br><br>

    <label>Нове зображення (файл):</label>
    <input type="file" name="image_file">

    <label>Або новий URL зображення:</label>
    <input type="text" name="image_url">

    <button type="submit" class="btn">Оновити</button>
</form>
