<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TravelGuide' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/theme-light.css" id="theme-link">
</head>
<body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="site-header">
    <div class="container header-inner">
        <div class="logo">
            <a href="/">TravelGuide</a>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="/">Головна</a></li>
                <li><a href="/routes">Маршрути</a></li>
                <li><a href="/gallery">Галерея</a></li>
                <li><a href="/news">Новини</a></li>
                <li><a href="/about">Про нас</a></li>
                <li><a href="/reviews">Відгуки</a></li>
                <li><a href="/contacts">Контакти</a></li>
            </ul>
        </nav>

        <div class="header-right">
            <button id="theme-toggle" aria-label="Змінити тему">🌙</button>

            <?php if (!empty($_SESSION['user'])): ?>
                <span class="user-info">
                    Привіт, <?= htmlspecialchars($_SESSION['user']['username']) ?>
                </span>
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a href="/admin" class="btn-link">Адмін-панель</a>
                <?php endif; ?>
                <a href="/logout" class="btn-link">Вийти</a>
            <?php else: ?>
                <a href="/login" class="btn-link">Увійти</a>
                <a href="/register" class="btn-link">Реєстрація</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<main class="container">
    <?= $content ?? '' ?>
</main>
<script>
    const themeToggle = document.getElementById('theme-toggle');
    const themeLink = document.getElementById('theme-link');

    let currentTheme = localStorage.getItem('theme') || 'light';
    themeLink.href = `/assets/css/theme-${currentTheme}.css`;
    themeToggle.textContent = currentTheme === 'light' ? '🌙' : '☀️';

    themeToggle.addEventListener('click', () => {
        if (currentTheme === 'light') {
            currentTheme = 'dark';
        } else {
            currentTheme = 'light';
        }
        themeLink.href = `/assets/css/theme-${currentTheme}.css`;
        themeToggle.textContent = currentTheme === 'light' ? '🌙' : '☀️';
        localStorage.setItem('theme', currentTheme);
    });
</script>
<footer class="site-footer">
    <p>&copy; <?= date('Y') ?> TravelGuide. Всі права захищено, а може і нє :D.</p>
</footer>
</body>
</html>
