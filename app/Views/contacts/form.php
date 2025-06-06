<h2>Зворотній зв’язок</h2>

<div id="formMessage" style="margin: 10px 0; font-weight: bold;"></div>

<form id="contactForm">
    <label>Ім’я:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Повідомлення:</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>

    <button type="submit">Надіслати</button>
</form>

<script>
document.getElementById('contactForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const data = new FormData(form);
    const msgContainer = document.getElementById('formMessage');

    msgContainer.textContent = 'Відправлення...';
    msgContainer.style.color = '#333';

    try {
        const response = await fetch('/send-contact', {
            method: 'POST',
            body: data
        });
        const result = await response.json();

        msgContainer.textContent = result.success || result.error;
        msgContainer.style.color = result.success ? 'green' : 'red';

        if (result.success) form.reset();
    } catch (err) {
        msgContainer.textContent = 'Сталася помилка. Спробуйте пізніше.';
        msgContainer.style.color = 'red';
    }

    setTimeout(() => {
        msgContainer.textContent = '';
    }, 4000);
});
</script>
