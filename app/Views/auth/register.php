<h2>Реєстрація</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="/handle-register">
    <label>Логін:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Зареєструватись</button>
</form>
