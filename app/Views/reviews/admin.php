<h2>Адмін - Відгуки</h2>

<?php foreach ($reviews as $review): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <strong><?= htmlspecialchars($review['user_name']) ?></strong>
        <p><?= nl2br(htmlspecialchars($review['text'])) ?></p>
        <small><?= $review['created_at'] ?> | <?= $review['approved'] ? '✅' : '⛔' ?></small><br>
        <?php if (!$review['approved']): ?>
            <a href="/reviews/approve/<?= $review['id'] ?>">✅ Схвалити</a> |
        <?php endif; ?>
        <a href="/reviews/edit/<?= $review['id'] ?>">✏️ Редагувати</a> |
        <a href="/reviews/delete/<?= $review['id'] ?>" onclick="return confirm('Видалити?')">🗑️ Видалити</a>
    </div>
<?php endforeach; ?>
