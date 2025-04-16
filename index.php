<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>GENSAISTORE - Top Up Game dan Kebutuhan Game</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #1e1e2f;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    .welcome-box {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 600px;
      text-align: center;
    }

    .welcome-box img {
      width: 100px;
      margin-bottom: 20px;
    }

    .welcome-box h1 {
      font-weight: bold;
      color: #ffdd00;
      font-size: 2.5rem;
    }

    .welcome-box h5 {
      color: #333;
    }

    .btn-custom {
      margin: 10px 5px;
      padding: 12px 25px;
      font-size: 1rem;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-home {
      background-color: #007bff;
      color: white;
    }

    .btn-login {
      background-color: #28a745;
      color: white;
    }

    .btn-home:hover {
      background-color: #0056b3;
    }

    .btn-login:hover {
      background-color: #1e7e34;
    }

    .moving-text {
      display: inline-block;
      white-space: nowrap;
      overflow: hidden;
      animation: slide 10s linear infinite;
      font-size: 1rem;
      color: #ff0000;
      margin-top: 15px;
    }

    @keyframes slide {
      0% {
        transform: translateX(100%);
      }

      100% {
        transform: translateX(-100%);
      }
    }

    .blinking-text {
      animation: blink 1.2s infinite;
      font-size: 1rem;
      color: #ff0000;
      margin-top: 10px;
    }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }

    .social-buttons a {
      margin: 5px;
    }
  </style>
</head>

<body>

  <div class="welcome-box">
    <img src="neo gennixx.png" alt="Logo Gensaistore">
    <h1>GENSAISTORE</h1>
    <h5>Top Up Game dan Kebutuhan Game Terpercaya</h5>
    <p class="mt-2">Sung login aja bosku 😎</p>

    <div class="mt-4">
      <a href="index.php" class="btn btn-custom btn-home">
        <i class="bi bi-house-door-fill"></i> Halaman Utama
      </a>
      <a href="login.php" class="btn btn-custom btn-login">
        <i class="bi bi-box-arrow-in-right"></i> Login Sekarang
      </a>
    </div>

    <p class="moving-text mt-4">⚡ Proses cepat & terpercaya, ga sampe 5 menit langsung jadi bray! ⚡</p>
    <p class="blinking-text">🔥 Dapatkan penawaran eksklusif hanya di Gensaistore! 🔥</p>

    <div class="social-buttons mt-3">
      <a href="https://www.instagram.com/gensaisme12/" target="_blank" class="btn btn-danger btn-custom">
        <i class="bi bi-instagram"></i> Instagram
      </a>
      <a href="https://wa.me/6285191592551" target="_blank" class="btn btn-success btn-custom">
        <i class="bi bi-whatsapp"></i> WhatsApp
      </a>
    </div>
  </div>

</body>

</html>
