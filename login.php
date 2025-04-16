<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login - Gensaistore</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #1e1e2f;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-box {
      background: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .login-box img {
      width: 100px;
      margin-bottom: 20px;
    }

    .login-box h4 {
      font-weight: bold;
      color: #ffdd00;
    }

    .form-label {
      font-weight: 600;
      color: #333;
    }

    .form-control,
    .form-select {
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      color: #333;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #ffdd00;
      box-shadow: 0 0 0 0.2rem rgba(255, 221, 0, 0.25);
    }

    .btn-login {
      background-color: #ffdd00;
      color: #000;
      font-weight: bold;
      border: none;
    }

    .btn-login:hover {
      background-color: #e6c800;
    }
  </style>
</head>

<body>

  <div class="login-box">
    <img src="neo gennixx.png" alt="Logo">
    <h4>GENSAISTORE</h4>
    <small>Hi Geners, login dulu yuk!</small>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger mt-3">
        <?= $_SESSION['error'];
        unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <form action="auth.php" method="POST" class="mt-4">
      <div class="mb-3 text-start">
        <label class="form-label">User ID Pengguna</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan ID Anda" required>
      </div>
      <div class="mb-3 text-start">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
      </div>
      <div class="mb-4 text-start">
        <label class="form-label">Pilih Role</label>
        <select name="role" class="form-select" required>
          <option value="user">User</option>
          <option value="staff">Staff</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <button type="submit" class="btn btn-login w-100">Masuk</button>
    </form>
   

  </div>

</body>

</html>