<h2>Зворотній зв’язок</h2>

<div id="formMessage" class="form-message"></div>

<form id="contactForm" class="contact-form">
    <label for="name">Ім’я:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Повідомлення:</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <button type="submit">Надіслати</button>
</form>

<script>
document.getElementById('contactForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const data = new FormData(form);
    const msgContainer = document.getElementById('formMessage');

    msgContainer.textContent = 'Відправлення...';
    msgContainer.style.color = 'var(--text-color)';

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
