<h2>Відгуки</h2>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php if (!empty($_SESSION['user'])): ?>
    <section class="container">
        <h2>Залишити відгук</h2>
        
        <form id="reviewForm" class="form" enctype="multipart/form-data">
            <input type="text" name="user_name" placeholder="Ваше ім'я" required>
            <textarea name="text" placeholder="Ваш відгук" required></textarea>
            <input type="file" name="image" accept="image/*">
            <button type="submit" class="btn">Надіслати</button>
        </form>

        <div id="reviewMessage" class="form-message"></div>
    </section>

    <script>
    document.getElementById('reviewForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        const response = await fetch('/reviews/submit', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        document.getElementById('reviewMessage').textContent = result.message;

        if (result.success) {
            form.reset();
        }
    });
    </script>
<?php else: ?>
    <p>Щоб залишити відгук, будь ласка, <a href="/login">увійдіть</a> або <a href="/register">зареєструйтесь</a>.</p>
<?php endif; ?>

<?php foreach ($reviews as $review): ?>
    <div class="review-item">
        <strong><?= htmlspecialchars($review['user_name'] ?? 'Користувач') ?></strong> 
        <small>(<?= htmlspecialchars($review['username'] ?? '') ?>)</small><br>
        <small><?= $review['created_at'] ?></small>
        <p><?= nl2br(htmlspecialchars($review['text'])) ?></p>
        <?php if (!empty($review['image'])): ?>
            <img src="/assets/reviews/<?= htmlspecialchars($review['image']) ?>" width="150" alt="зображення відгуку" class="review-image"><br>
        <?php endif; ?>
        <hr>
    </div>
<?php endforeach; ?>
