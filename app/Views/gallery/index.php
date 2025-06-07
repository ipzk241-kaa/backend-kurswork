<h2 class="section-title"><?= $title ?></h2>

<div class="gallery-grid">
    <?php foreach ($images as $img): ?>
        <div class="gallery-item">
           <img src="/assets/img/<?= htmlspecialchars($img['image_path']) ?>" 
           alt="<?= htmlspecialchars($img['title']) ?>" 
           onclick="openLightbox(this.src)" 
           style="cursor: zoom-in;">
            <p><?= htmlspecialchars($img['title']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
<!-- Lightbox HTML -->
<div id="lightbox" class="lightbox">
    <span class="close" onclick="closeLightbox()">×</span>
    <img class="lightbox-img" id="lightbox-img">
</div>

<script>
function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const img = document.getElementById('lightbox-img');
    img.src = src;
    lightbox.style.display = 'flex';
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}
</script>