<?php
session_start();
include '../config/koneksi.php';

// Ambil input dari form
$email = $_POST['email'];
$password = $_POST['password'];

// Query ke database
$query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");

// Cek hasil
if (mysqli_num_rows($query) == 1) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['login'] = true;
    $_SESSION['admin_id'] = $data['id'];
    $_SESSION['admin_nama'] = $data['nama'];
    header('Location: ../pages/admin/admin.php');
    exit;
} else {
    echo 'Login gagal. Email atau password salah.';
}
