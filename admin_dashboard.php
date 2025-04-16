<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Gensaistore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #ffdd00;
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light px-4">
    <a class="navbar-brand fw-bold" href="#">GENSAISTORE - Admin</a>
    <div class="ms-auto">
        <span class="me-3">Halo, <?= htmlspecialchars($username) ?> (<?= $role ?>)</span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <h3 class="mb-4">Selamat datang di Admin Dashboard 🎮</h3>
    <div class="alert alert-info">Sebagai admin, Anda dapat mengelola semua transaksi dan pengaturan toko.</div>

    <div class="row">
        <!-- Manage Users -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Kelola Pengguna</h5>
                    <p class="card-text">Manajemen pengguna, termasuk menambah, mengedit, atau menghapus pengguna.</p>
                    <a href="manage_users.php" class="btn btn-warning w-100">Kelola Pengguna</a>
                </div>
            </div>
        </div>

        <!-- View Transactions -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Lihat Transaksi</h5>
                    <p class="card-text">Melihat laporan transaksi top-up yang dilakukan oleh pengguna.</p>
                    <a href="transactions.php" class="btn btn-warning w-100">Lihat Transaksi</a>
                </div>
            </div>
        </div>

        <!-- Settings -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Pengaturan Toko</h5>
                    <p class="card-text">Mengelola pengaturan umum toko seperti harga atau promo.</p>
                    <a href="store_settings.php" class="btn btn-warning w-100">Pengaturan Toko</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
