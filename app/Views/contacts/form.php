<h2>Зворотній зв’язок</h2>

<?php if (!empty($error)): ?>
    <p style="color: red"><?= $error ?></p>
<?php elseif (!empty($success)): ?>
    <p style="color: green"><?= $success ?></p>
<?php endif; ?>

<form method="POST" action="/send-contact">
    <label>Ім’я:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Повідомлення:</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>

    <button type="submit">Надіслати</button>
</form>
