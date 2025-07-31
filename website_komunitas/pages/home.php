<?php
include __DIR__ . '/../config/koneksi.php';

// Ambil 3 berita terbaru
$sql = "SELECT berita.*, admin.nama AS nama_admin FROM berita 
        JOIN admin ON berita.admin_id = admin.id 
        ORDER BY tanggal_upload DESC LIMIT 3";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Query error: " . mysqli_error($conn));
}

$berita = [];
while ($row = mysqli_fetch_assoc($query)) {
    $berita[] = $row;
}
?>

<!-- Tambahkan styling khusus -->
<style>
    .carousel-caption-custom {
        background: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
    }

    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<!-- Carousel Full Width -->
<div class="w-100">
    <div id="carouselBerita" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <?php
            $active = true;
            foreach ($berita as $row):
            ?>
                <div class="carousel-item <?= $active ? 'active' : '' ?>">
                    <div class="position-relative" style="height: 400px;">
                        <img src="../upload/berita/<?= htmlspecialchars($row['foto']) ?>"
                            class="d-block w-100"
                            style="height: 100%; object-fit: cover;"
                            alt="Slide Berita">
                        <div class="carousel-caption d-none d-md-block carousel-caption-custom position-absolute top-50 start-50 translate-middle w-75 text-center text-white">
                            <h3><?= htmlspecialchars($row['judul']) ?></h3>
                            <p><?= substr(strip_tags($row['isi']), 0, 100) ?>...</p>
                            <a href="berita_detail.php?id=<?= $row['id'] ?>" class="btn btn-light btn-sm">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php
                $active = false;
            endforeach;
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBerita" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBerita" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
</div>

<!-- Konten berita di bawah carousel -->
<div class="container mt-5">
    <h2 class="mb-4 text-primary fw-bold">Berita Terbaru</h2>
    <div class="row">
        <?php if (count($berita) > 0): ?>
            <?php foreach ($berita as $row): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="../upload/berita/<?= htmlspecialchars($row['foto']) ?>" class="card-img-top" alt="Gambar Berita" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
                            <p class="card-text mb-2"><?= substr(strip_tags($row['isi']), 0, 100) ?>...</p>
                            <small class="text-muted mt-auto">
                                Diunggah oleh <strong><?= htmlspecialchars($row['nama_admin']) ?></strong><br>
                                <?= date('d M Y', strtotime($row['tanggal_upload'])) ?>
                            </small>
                            <a href="berita_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm mt-2">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Belum ada berita yang tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>