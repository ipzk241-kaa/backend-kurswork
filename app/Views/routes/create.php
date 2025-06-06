<h2><?= $title ?></h2>

<form method="POST" action="<?= isset($route) ? '/routes/update/' . $route['id'] : '/routes/store' ?>">
    <label>Назва:</label><br>
    <input type="text" name="title" value="<?= $route['title'] ?? '' ?>" required><br><br>

    <label>Опис:</label><br>
    <textarea name="description" required><?= $route['description'] ?? '' ?></textarea><br><br>

    <label>Зображення (URL або адреса на пк):</label><br>
    <input type="text" name="image" value="<?= $route['image'] ?? '' ?>"><br><br>

    <label>Тривалість:</label><br>
    <input type="text" name="duration" value="<?= $route['duration'] ?? '' ?>"><br><br>

    <label>Ціна (грн):</label><br>
    <input type="number" step="0.01" name="price" value="<?= $route['price'] ?? 0 ?>"><br><br>

    <button type="submit">Зберегти</button>
</form>
