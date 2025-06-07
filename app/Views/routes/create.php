<h2><?= $title ?></h2>

<form method="POST" action="/routes/store" enctype="multipart/form-data" class="form">
    <?php include __DIR__ . '/_form_fields.php'; ?>
    <button type="submit" class="btn-primary">Створити маршрут</button>
</form>
