<?php
include '../config/koneksi.php';
include 'auth_session.php'; // Pastikan ini memuat session_start() dan $_SESSION

// Tangkap input
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$tanggal_upload = date('Y-m-d');
$admin_id = $_SESSION['admin_id']; // pastikan session ini ada saat login

// Proses upload file
$foto_name = '';
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $targetDir = '../upload/berita/';
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileTmp = $_FILES['foto']['tmp_name'];
    $fileName = basename($_FILES['foto']['name']);
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $uniqueName = uniqid() . '.' . $fileExt;

    $targetFilePath = $targetDir . $uniqueName;

    if (move_uploaded_file($fileTmp, $targetFilePath)) {
        $foto_name = $uniqueName;
    }
}

// Query simpan ke database
$query = "INSERT INTO berita(judul, isi, foto, tanggal_upload, admin_id) 
          VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssssi", $judul, $isi, $foto_name, $tanggal_upload, $admin_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Redirect
header('Location: ../pages/admin/admin.php');
exit;
