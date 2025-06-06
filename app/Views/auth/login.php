<h2>Вхід до адмін-панелі</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="/handle-login">
    <label>Логін:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Увійти</button>
</form>
