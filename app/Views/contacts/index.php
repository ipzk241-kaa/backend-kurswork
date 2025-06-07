<h2>Повідомлення користувачів</h2>

<?php foreach ($messages as $msg): ?>
    <div class="contact-message">
        <p><strong><?= htmlspecialchars($msg['name']) ?> (<?= htmlspecialchars($msg['email']) ?>)</strong></p>
        <p><?= nl2br(htmlspecialchars($msg['message'])) ?></p>
        <small>Надіслано: <?= $msg['sent_at'] ?></small><br>
        <a href="/contacts/delete/<?= $msg['id'] ?>" onclick="return confirm('Видалити повідомлення?')">🗑️ Видалити</a>
    </div>
<?php endforeach; ?>
