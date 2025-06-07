<?php $title = 'Залишити відгук'; ?>

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
