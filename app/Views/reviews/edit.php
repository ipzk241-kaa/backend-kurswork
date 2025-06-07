<?php $title = 'Редагувати відгук'; ?>

<section class="container">
    <h2>Редагувати відгук</h2>

    <form method="POST" class="form" enctype="multipart/form-data" action="/reviews/update/<?= $review['id'] ?>">
        <input type="text" name="user_name" value="<?= htmlspecialchars($review['user_name']) ?>" required>
        <textarea name="text" required><?= htmlspecialchars($review['text']) ?></textarea>
        <input type="file" name="image" accept="image/*">
        <button type="submit" class="btn">Оновити</button>
    </form>
</section>
