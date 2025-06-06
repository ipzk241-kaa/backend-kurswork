<h2><?= $title ?></h2>
<div style="display: flex; flex-wrap: wrap; gap: 10px;">
    <?php foreach ($images as $img): ?>
        <div style="width: 200px; text-align: center;">
            <img src="/assets/img/<?= htmlspecialchars($img['image_path']) ?>" style="max-width: 100%;">
            <p><?= htmlspecialchars($img['title']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
