<h1>Додати новину</h1>
<form action="/news/store" method="POST" enctype="multipart/form-data">
    <label>Заголовок:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Текст новини:</label><br>
    <textarea name="content" rows="6" required></textarea><br><br>

    <label>Дата:</label><br>
    <input type="date" name="date" value="<?= date('Y-m-d') ?>"><br><br>

    <label>Зображення (можна декілька):</label><br>
    <input type="file" name="images[]" multiple><br><br>
    <label>Або додати зображення за посиланням (можна декілька, через кому):</label><br>
    <input type="text" name="image_links"><br><br>
    <button type="submit">Зберегти</button>
</form>
