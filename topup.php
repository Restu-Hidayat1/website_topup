<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

$game = $_GET['game'] ?? 'unknown';

// Daftar game dan satuannya
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

if (!isset($game_names[$game])) {
    $_SESSION['error'] = "Game tidak valid.";
    header("Location: dashboard.php");
    exit;
}

$game_title = $game_names[$game];
$unit = $game_units[$game];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Top Up <?= $game_title ?> - Gensaistore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function showPaymentField() {
            const metode = document.getElementById('metode').value;
            const container = document.getElementById('payment-detail');

            let label = '';
            let placeholder = '';

            switch (metode) {
                case 'gopay':
                    label = 'Nomor GoPay';
                    placeholder = '08xxxxxxxxxx';
                    break;
                case 'dana':
                    label = 'Nomor DANA';
                    placeholder = '08xxxxxxxxxx';
                    break;
                case 'ovo':
                    label = 'Nomor OVO';
                    placeholder = '08xxxxxxxxxx';
                    break;
                case 'transfer':
                    label = 'Nama Rekening';
                    placeholder = 'Nama Lengkap';
                    break;
                default:
                    container.innerHTML = '';
                    return;
            }

            container.innerHTML = `
                <div class="mb-3">
                    <label class="form-label">${label}</label>
                    <input type="text" name="pembayaran_detail" class="form-control" placeholder="${placeholder}" required>
                </div>
            `;
        }

        // Validasi untuk input User ID hanya angka
        function validateUserId(event) {
            const userIdInput = document.getElementById('user_id');
            const userIdValue = userIdInput.value;

            if (isNaN(userIdValue) || userIdValue.includes('.') || userIdValue === "") {
                userIdInput.setCustomValidity("User ID hanya boleh angka dan tidak boleh mengandung desimal.");
            } else {
                userIdInput.setCustomValidity("");
            }
        }
    </script>
</head>
<body class="bg-light">
<div class="container py-5">
    <h3 class="mb-4 text-center">Top Up <?= htmlspecialchars($game_title) ?></h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="proses_topup.php" method="POST" class="bg-white p-4 shadow rounded">
                <input type="hidden" name="game" value="<?= htmlspecialchars($game) ?>">

                <div class="mb-3">
                    <label class="form-label">User ID Game</label>
                    <input type="text" class="form-control" name="user_id" id="user_id" oninput="validateUserId(event)" required>
                    <div class="invalid-feedback">
                        User ID hanya boleh angka dan tidak boleh mengandung desimal.
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Top Up</label>
                    <select name="jumlah" class="form-select" required>
                        <?php foreach ($harga_list as $jumlah => $harga): ?>
                            <option value="<?= $jumlah ?>">
                                <?= $jumlah . ' ' . $unit ?> - Rp<?= number_format($harga, 0, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode" class="form-select" id="metode" onchange="showPaymentField()" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="gopay">GoPay</option>
                        <option value="dana">DANA</option>
                        <option value="ovo">OVO</option>
                        
                    </select>
                </div>

                <!-- Kolom input dinamis berdasarkan metode -->
                <div id="payment-detail"></div>

                <button type="submit" class="btn btn-warning w-100">Proses Top Up</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
