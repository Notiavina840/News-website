<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/auth.php';

redirect_if_authenticated();

$error = null;
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } elseif (!attempt_login($username, $password)) {
        $error = 'Invalid credentials. Please try again.';
    } else {
        header('Location: /dashboard.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice Login</title>
    <style>
        :root {
            color-scheme: light;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 380px;
        }
        h1 {
            margin-top: 0;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
            color: #111827;
        }
        label {
            display: block;
            margin-bottom: 0.35rem;
            font-weight: 600;
            color: #374151;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 1rem;
            transition: border-color 0.2s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #2563eb;
        }
        .btn {
            width: 100%;
            padding: 0.85rem;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        .btn:hover {
            background: #1d4ed8;
        }
        .alert {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecdd3;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>Backoffice Login</h1>
        <?php if ($error): ?>
            <div class="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
        <form method="post" action="/login.php" autocomplete="off">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button class="btn" type="submit">Sign in</button>
        </form>
    </main>
</body>
</html>
