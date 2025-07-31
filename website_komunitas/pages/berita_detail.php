<?php
include __DIR__ . '/../config/koneksi.php';
include __DIR__ . '/../header.php';


$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>ID berita tidak ditemukan.</div></div>";
    exit;
}

// Ambil data berita berdasarkan ID
$sql = "SELECT berita.*, admin.nama AS nama_admin FROM berita 
        JOIN admin ON berita.admin_id = admin.id 
        WHERE berita.id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$berita = mysqli_fetch_assoc($result);

if (!$berita) {
    echo "<div class='container mt-5'><div class='alert alert-warning'>Berita tidak ditemukan.</div></div>";
    exit;
}
?>

<style>
    .hero-img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }

    .detail-title {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .meta-info {
        font-size: 0.9rem;
        color: #777;
    }

    .berita-isi p {
        text-align: justify;
        line-height: 1.7;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <!-- Konten utama -->
        <div class="col-lg-8">
            <!-- Gambar utama -->
            <img src="../upload/berita/<?= htmlspecialchars($berita['foto']) ?>" class="hero-img mb-4" alt="Gambar Berita">

            <!-- Judul -->
            <h1 class="detail-title"><?= htmlspecialchars($berita['judul']) ?></h1>

            <!-- Info admin dan tanggal -->
            <p class="meta-info mb-4">
                Diunggah oleh <strong><?= htmlspecialchars($berita['nama_admin']) ?></strong> pada
                <?= date('d M Y', strtotime($berita['tanggal_upload'])) ?>
            </p>

            <!-- Isi berita -->
            <div class="berita-isi">
                <?= nl2br($berita['isi']) ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Berita Lainnya</h5>
                    <ul class="list-group list-group-flush">
                        <?php
                        $sql_lain = "SELECT id, judul FROM berita WHERE id != ? ORDER BY tanggal_upload DESC LIMIT 5";
                        $stmt_lain = mysqli_prepare($conn, $sql_lain);
                        mysqli_stmt_bind_param($stmt_lain, 's', $id);
                        mysqli_stmt_execute($stmt_lain);
                        $result_lain = mysqli_stmt_get_result($stmt_lain);
                        while ($lain = mysqli_fetch_assoc($result_lain)) :
                        ?>
                            <li class="list-group-item">
                                <a href="berita_detail.php?id=<?= $lain['id'] ?>" class="text-decoration-none"><?= htmlspecialchars($lain['judul']) ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>