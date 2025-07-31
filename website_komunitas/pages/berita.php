<?php include __DIR__ . '../../header.php'; ?>
<?php include __DIR__ . '../../config/koneksi.php'; ?>

<style>
    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container mt-5">
    <h1 class="mb-4 text-dark fw-bold text-center">Berita Terbaru</h1>

    <div class="row">
        <?php
        $sql = "SELECT berita.*, admin.nama AS nama_admin FROM berita 
                JOIN admin ON berita.admin_id = admin.id 
                ORDER BY tanggal_upload DESC";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0):
            while ($row = mysqli_fetch_assoc($query)):
        ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="../upload/berita/<?= htmlspecialchars($row['foto']) ?>" class="card-img-top" alt="Gambar Berita" style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
                            <p class="card-text"><?= substr(strip_tags($row['isi']), 0, 100) ?>...</p>
                            <p class="text-muted small mt-auto">
                                Diunggah oleh <strong><?= htmlspecialchars($row['nama_admin']) ?></strong> pada <?= date('d M Y', strtotime($row['tanggal_upload'])) ?>
                            </p>
                            <a href="berita_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm mt-2">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        else:
            ?>
            <div class="col-12">
                <div class="alert alert-info">Belum ada berita yang tersedia.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '../../footer.php'; ?>