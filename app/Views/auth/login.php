<h2>Вхід</h2>

<?php if (!empty($error)): ?>
    <p class="form-error"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="/handle-login" class="auth-form">
    <label for="username">Логін:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Увійти</button>
</form>
