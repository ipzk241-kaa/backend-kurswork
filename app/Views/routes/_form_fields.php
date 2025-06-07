<label>Назва:</label>
<input type="text" name="title" value="<?= $route['title'] ?? '' ?>" required>

<label>Опис:</label>
<textarea name="description" required><?= $route['description'] ?? '' ?></textarea>

<label>Тривалість:</label>
<input type="text" name="duration" value="<?= $route['duration'] ?? '' ?>">

<label>Ціна (грн):</label>
<input type="number" step="0.01" name="price" value="<?= $route['price'] ?? '' ?>">

<label>Зображення (URL або файл):</label>
<input type="text" name="image_url" placeholder="https://..." value="<?= $route['image'] ?? '' ?>">
<input type="file" name="image_file">
