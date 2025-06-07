<h2 class="section-title"><?= $title ?></h2>

<?php if (!empty($error)): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

<form method="POST" action="/gallery/store" enctype="multipart/form-data" class="form">
    <label>Назва:</label>
    <input type="text" name="title" required>

    <label>Зображення (файл):</label>
    <input type="file" name="image_file">

    <label>Або вставте URL зображення:</label>
    <input type="text" name="image_url" placeholder="https://...">

    <button type="submit" class="btn">Додати</button>
</form>
