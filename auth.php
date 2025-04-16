<?php
session_start();


$akun = [
    'admin' => [
        'password' => 'admin123',
        'role' => 'admin'
    ],
    'staff' => [
        'password' => 'staff123',
        'role' => 'staff'
    ],
    'user' => [
        'password' => 'user123',
        'role' => 'user'
    ]
];


$username = strtolower(trim($_POST['username'] ?? ''));
$password = $_POST['password'] ?? '';
$role = strtolower(trim($_POST['role'] ?? ''));


if (empty($username) || empty($password) || empty($role)) {
    $_SESSION['error'] = "Semua field wajib diisi.";
    header("Location: login.php");
    exit;
}


if (isset($akun[$username]) && $akun[$username]['password'] === $password && $akun[$username]['role'] === $role) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

   
    switch ($role) {
        case 'admin':
            header("Location: admin_dashboard.php");
            break;
        case 'staff':
            header("Location: staff_dashboard.php");
            break;
        case 'user':
            header("Location: dashboard.php");
            break;
        default:
            $_SESSION['error'] = "Role tidak valid.";
            header("Location: login.php");
    }
    exit;
} else {
    $_SESSION['error'] = "Login gagal! Periksa kembali username, password, atau role.";
    header("Location: login.php");
    exit;
}
