<h2><?= $title ?></h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="/gallery/store" enctype="multipart/form-data">
    <label>Назва:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Зображення (файл):</label><br>
    <input type="file" name="image_file"><br><br>

    <label>Або вставте URL зображення:</label><br>
    <input type="text" name="image_url"><br><br>

    <button type="submit">Додати</button>
</form>
