<h2>Залишити відгук</h2>

<form method="POST" enctype="multipart/form-data" action="/reviews/store">
    <input type="text" name="user_name" placeholder="Ваше ім'я" required><br><br>
    <textarea name="text" placeholder="Ваш відгук" required></textarea><br><br>
     <input type="file" name="image" accept="image/*">
    <button type="submit">Надіслати</button>
</form>
