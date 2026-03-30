<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/auth.php';

ensure_session_started();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f9fafb;
            color: #111827;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            text-align: center;
            max-width: 500px;
        }
        a.btn {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.75rem 1.1rem;
            background: #2563eb;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
        }
        a.btn.secondary {
            background: #10b981;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>News Website</h1>
        <p>This is a placeholder front page. Use the backoffice to manage content.</p>
        <a class="btn" href="/login.php">Go to backoffice login</a>
        <?php if ($user): ?>
            <a class="btn secondary" href="/dashboard.php">Dashboard</a>
        <?php endif; ?>
    </div>
</body>
</html>
