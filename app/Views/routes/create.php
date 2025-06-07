<h2><?= $title ?></h2>

<form method="POST" action="/routes/store" enctype="multipart/form-data">
    <label>Назва:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Опис:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Тривалість:</label><br>
    <input type="text" name="duration"><br><br>

    <label>Ціна:</label><br>
    <input type="number" name="price" step="0.01"><br><br>

    <label>Зображення (URL або файл):</label><br>
    <input type="text" name="image_url" placeholder="https://..."><br>
    <input type="file" name="image_file"><br><br>

    <button type="submit">Створити маршрут</button>
</form>

