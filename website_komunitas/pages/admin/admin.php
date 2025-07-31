<?php
include '../../proses/auth_session.php';
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../../proses/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Admin -->
    <div class="container mt-4">
        <h3>Tambah Berita</h3>
        <form method="post" action="../../proses/berita_proses.php" enctype="multipart/form-data">
            <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
            <textarea name="isi" class="form-control mb-2" rows="5" placeholder="Isi berita..." required></textarea>
            <input type="file" name="foto" class="form-control mb-2" accept="image/*">
            <button class="btn btn-success">Tambah</button>
        </form>

        <hr>

        <h4>Daftar Berita</h4>
        <div class="row">
            <?php
            $q = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
            while ($r = mysqli_fetch_assoc($q)) {
            ?>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <?php if (!empty($r['foto'])) : ?>
                            <img src="../../upload/berita/<?= htmlspecialchars($r['foto']) ?>" class="card-img-top" style="max-height:200px; object-fit:cover;">
                        <?php else : ?>
                            <div class="text-center text-muted p-3">Tidak ada foto</div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($r['judul']) ?></h5>
                            <p class="card-text"><?= nl2br(htmlspecialchars($r['isi'])) ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="../../proses/edit_berita.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="../../proses/hapus_berita.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-4">© 2025 KPAN</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>