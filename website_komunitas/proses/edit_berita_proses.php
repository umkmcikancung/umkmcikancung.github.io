<?php
include '../config/koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
mysqli_query($conn, "UPDATE berita SET judul='$judul', isi='$isi' WHERE id=$id");
header("Location: ../pages/admin/admin.php");
