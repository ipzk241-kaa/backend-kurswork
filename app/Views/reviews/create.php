<h2>Залишити відгук</h2>

<form id="reviewForm" enctype="multipart/form-data">
    <input type="text" name="user_name" placeholder="Ваше ім'я" required><br><br>
    <textarea name="text" placeholder="Ваш відгук" required></textarea><br><br>
    <input type="file" name="image" accept="image/*"><br><br>
    <button type="submit">Надіслати</button>
</form>

<div id="reviewMessage" style="margin-top: 10px; font-weight: bold;"></div>

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
