<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/auth.php';

require_authentication();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f3f4f6;
            color: #111827;
        }
        header {
            background: #111827;
            color: #fff;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        main {
            padding: 2rem 1.5rem;
            max-width: 960px;
            margin: 0 auto;
        }
        a.btn {
            display: inline-block;
            padding: 0.6rem 1rem;
            background: #2563eb;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.2s ease;
        }
        a.btn:hover {
            background: #1d4ed8;
        }
        .card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body>
    <header>
        <div>Backoffice</div>
        <div>
            <span>Signed in as <?= htmlspecialchars($user['username'] ?? 'user', ENT_QUOTES, 'UTF-8') ?></span>
            <a class="btn" href="/logout.php">Logout</a>
        </div>
    </header>
    <main>
        <div class="card">
            <h1>Dashboard</h1>
            <p>This page is protected by a session check. Add your admin content here.</p>
        </div>
    </main>
</body>
</html>
