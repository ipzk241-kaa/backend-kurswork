<h2>Редагувати відгук</h2>

<form method="POST" action="/reviews/update/<?= $review['id'] ?>">
    <input type="text" name="user_name" value="<?= htmlspecialchars($review['user_name']) ?>" required><br><br>
    <textarea name="text" required><?= htmlspecialchars($review['text']) ?></textarea><br><br>
    <button type="submit">Оновити</button>
</form>
