<?php
session_start();
if (!isset($_SESSION['username']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

$game = $_POST['game'] ?? 'unknown';
$user_id = $_POST['user_id'] ?? '';
$jumlah = (int) ($_POST['jumlah'] ?? 0);
$metode = $_POST['metode'] ?? '';
$pembayaran_detail = $_POST['pembayaran_detail'] ?? '';

$game_names = [
    'ml' => 'Mobile Legends',
    'ff' => 'Free Fire',
    'pubg' => 'PUBG Mobile',
    'genshin' => 'Genshin Impact',
    'valorant' => 'Valorant',
    'roblox' => 'Roblox',
    'csgo' => 'CSGO'
];

$game_units = [
    'ml' => 'Diamond',
    'ff' => 'Diamond',
    'pubg' => 'UC',
    'genshin' => 'Genesis Crystal',
    'valorant' => 'VP',
    'roblox' => 'Robux',
    'csgo' => 'Balance'
];

$harga_list = [
    50 => 10000,
    100 => 18000,
    250 => 40000,
    500 => 75000
];

$game_title = $game_names[$game] ?? 'Game Tidak Dikenal';
$unit = $game_units[$game] ?? 'Unit';
$harga = $harga_list[$jumlah] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Top Up Berhasil - Gensaistore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="bg-white p-4 shadow rounded text-center">
        <h3 class="mb-4 text-success">✅ Top Up Berhasil!</h3>

        <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
        <p><strong>Game:</strong> <?= htmlspecialchars($game_title) ?></p>
        <p><strong>User ID Game:</strong> <?= htmlspecialchars($user_id) ?></p>
        <p><strong>Jumlah:</strong> <?= $jumlah . ' ' . $unit ?></p>
        <p><strong>Harga:</strong> Rp<?= number_format($harga, 0, ',', '.') ?></p>
        <p><strong>Metode Pembayaran:</strong> <?= ucfirst($metode) ?></p>
        <p><strong>Detail Pembayaran:</strong> <?= htmlspecialchars($pembayaran_detail) ?></p>

        <div class="alert alert-success mt-4">
            Terima kasih telah melakukan top up di <strong>Gensaistore</strong>! Sampai bertemu di transaksi berikutnnya, juragan. 🎮
        </div>

        <a href="dashboard.php" class="btn btn-warning mt-3">🔙 Kembali ke Dashboard</a>
    </div>
</div>
</body>
</html>
