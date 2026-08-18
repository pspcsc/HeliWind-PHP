<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/crud.php';

if (admin_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$csrf = csrf_token('admin_login');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_verify('admin_login', (string)($_POST['_csrf'] ?? ''))) {
        $error = 'Security token expired. Please try again.';
    } else {
        $username = trim((string)($_POST['username'] ?? ''));
        $password = trim((string)($_POST['password'] ?? ''));

        $user = fetchOne('SELECT * FROM users WHERE username = :u OR email = :u LIMIT 1', ['u' => $username]);

        if ($user && (
            password_verify($password, (string)$user['password']) ||
            hash_equals((string)$user['password'], $password)
        )) {
            $_SESSION['admin_user'] = [
                'id' => (int)$user['id'],
                'full_name' => (string)$user['full_name'],
                'email' => (string)$user['email'],
                'role' => (string)$user['role'],
            ];
            header('Location: dashboard.php');
            exit;
        }

        $error = 'Invalid username or password.';
    }
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login · HeliWind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h4 fw-bold mb-3">HeliWind Admin</h1>
                    <p class="text-muted small">Sign in to manage site content.</p>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <input type="hidden" name="_csrf" value="<?php echo e($csrf); ?>">
                        <div class="mb-3">
                            <label class="form-label">Username / Email</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button class="btn btn-dark w-100">Login</button>
                    </form>
                    <div class="small text-muted mt-3">Default seed login: admin / admin123</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
