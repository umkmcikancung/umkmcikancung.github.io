<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM berita WHERE id=$id");
$data = mysqli_fetch_assoc($q);
?>

<form method="post" action="edit_berita_proses.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control mb-2">
    <textarea name="isi" class="form-control mb-2"><?= htmlspecialchars($data['isi']) ?></textarea>
    <button class="btn btn-primary">Update</button>
</form>