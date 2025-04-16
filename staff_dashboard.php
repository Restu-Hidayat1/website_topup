<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'staff') {
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
    <title>Staff Dashboard - Gensaistore</title>
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
    <a class="navbar-brand fw-bold" href="#">GENSAISTORE - Staff</a>
    <div class="ms-auto">
        <span class="me-3">Halo, <?= htmlspecialchars($username) ?> (<?= $role ?>)</span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <h3 class="mb-4">Selamat datang di Staff Dashboard 🎮</h3>
    <div class="alert alert-info">Sebagai staff, Anda dapat memproses transaksi top-up dan membantu pengguna.</div>

    <div class="row">
        <!-- Process Top-up -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Proses Top-up</h5>
                    <p class="card-text">Mengelola dan memverifikasi proses transaksi top-up yang dilakukan oleh pengguna.</p>
                    <a href="process_topup.php" class="btn btn-warning w-100">Proses Top Up</a>
                </div>
            </div>
        </div>

        <!-- View Pending Requests -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Permintaan Menunggu</h5>
                    <p class="card-text">Lihat transaksi yang menunggu konfirmasi atau verifikasi dari staff.</p>
                    <a href="pending_requests.php" class="btn btn-warning w-100">Lihat Permintaan</a>
                </div>
            </div>
        </div>

        <!-- User Support -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Dukungan Pengguna</h5>
                    <p class="card-text">Memberikan bantuan kepada pengguna yang mengalami kendala dengan top-up mereka.</p>
                    <a href="user_support.php" class="btn btn-warning w-100">Dukungan Pengguna</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
