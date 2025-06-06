<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'TravelGuide' ?></title>
</head>
<body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <?php if (!empty($_SESSION['user'])): ?>
        <p>Привіт, <?= htmlspecialchars($_SESSION['user']['username']) ?> |
            <a href="/logout">Вийти</a>
        </p>
    <?php else: ?>
        <a href="/login">Увійти</a> |
        <a href="/register">Реєстрація</a>
    <?php endif; ?>
</nav>
<hr>
    <?= $content ?>
</body>
</html>
