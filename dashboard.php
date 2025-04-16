<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
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
    <title>Dashboard - Gensaistore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #1e1e2f;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
        }

        .navbar {
            background-color: #ffdd00;
        }

        .navbar .navbar-brand {
            font-weight: bold;
            color: #000;
        }

        .navbar .btn {
            font-weight: 600;
        }

        h3 {
            color: #ffdd00;
            font-weight: bold;
        }

        .card {
            background: #2a2a40;
            border: none;
            color: #fff;
            transition: 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(255, 221, 0, 0.4);
        }

        .card-title {
            color: #ffdd00;
        }

        .card-text {
            font-size: 0.9rem;
        }

        .card-img-top {
            height: 120px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .btn-warning {
            background-color: #ffdd00;
            color: #000;
            font-weight: bold;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e6c800;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" href="#">GENSAISTORE</a>
        <div class="ms-auto">
            <span class="me-3 text-dark fw-semibold">Halo, <?= htmlspecialchars($username) ?> (<?= $role ?>)</span>
            <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h3 class="mb-3 text-center">🎮Pilih Game Anda</h3>
        <div class="alert alert-success text-center">
            Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>! Yuk top up game favoritmu!
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $games = [
                ['ml.jpg', 'Mobile Legends', 'Top up Diamond Mobile Legends dengan harga terbaik!', 'ml'],
                ['ff.jpg', 'Free Fire', 'Top up Diamond Free Fire aman & cepat.', 'ff'],
                ['pubg.jpg', 'PUBG Mobile', 'UC PUBG langsung masuk ke akunmu!', 'pubg'],
                ['genshin.jpg', 'Genshin Impact', 'Top up Genesis Crystal dan Primogems dengan aman!', 'genshin'],
                ['valorant.jpg', 'Valorant', 'Top up Valorant Point dan skin favoritmu!', 'valorant'],
                ['roblox.jpg', 'Roblox', 'Beli Robux dengan harga bersahabat!', 'roblox'],
                ['csgo.jpg', 'CSGO', 'Top up balance untuk skin dan item CSGO.', 'csgo'],
            ];

            foreach ($games as $game) {
                list($img, $title, $desc, $code) = $game;
                echo <<<HTML
                <div class="col-md-3">
                    <div class="card shadow">
                        <img src="$img" class="card-img-top" alt="$title">
                        <div class="card-body">
                            <h5 class="card-title">$title</h5>
                            <p class="card-text">$desc</p>
                            <a href="topup.php?game=$code" class="btn btn-warning w-100">Top Up Sekarang</a>
                        </div>
                    </div>
                </div>
                HTML;
            }
            ?>
        </div>
    </div>

</body>

</html>
