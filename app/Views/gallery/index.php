<h2 class="section-title"><?= $title ?></h2>

<?php $initialImages = array_slice($images, 0, 10); ?>
<div class="gallery-grid" id="gallery-container">
    <?php foreach ($initialImages as $img): ?>
        <div class="gallery-item">
            <img src="/assets/img/<?= htmlspecialchars($img['image_path']) ?>" 
                 alt="<?= htmlspecialchars($img['title']) ?>" 
                 onclick="openLightbox(this.src)" style="cursor: zoom-in;">
            <p><?= htmlspecialchars($img['title']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
<button class="btn" id="load-more" data-offset="10">Завантажити ще</button>
<!-- Lightbox HTML -->
<div id="lightbox" class="lightbox">
    <span class="close" onclick="closeLightbox()">×</span>
    <img class="lightbox-img" id="lightbox-img">
</div>

<script>
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').style.display = 'flex';
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}

document.getElementById('load-more').addEventListener('click', function () {
    const btn = this;
    const offset = parseInt(btn.dataset.offset);
    
    fetch(`/gallery/load-more?offset=${offset}`)
        .then(res => res.json())
        .then(images => {
            if (images.length === 0) {
                btn.remove();
                return;
            }
            const container = document.getElementById('gallery-container');
            images.forEach(img => {
                const div = document.createElement('div');
                div.className = 'gallery-item';
                div.innerHTML = `
                    <img src="/assets/img/${img.image_path}" alt="${img.title}" 
                         onclick="openLightbox(this.src)" style="cursor: zoom-in;">
                    <p>${img.title}</p>
                `;
                container.appendChild(div);
            });
            btn.dataset.offset = offset + images.length;
        });
});
</script>