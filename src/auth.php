<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';

function ensure_session_started(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

function current_user(): ?array
{
    ensure_session_started();

    if (!isset($_SESSION['user_id'])) {
        return null;
    }

    return [
        'id' => (int) $_SESSION['user_id'],
        'username' => $_SESSION['username'] ?? '',
    ];
}

function attempt_login(string $username, string $password): bool
{
    $pdo = db();
    $stmt = $pdo->prepare('SELECT id, username, password FROM utilisateurs WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        return false;
    }

    ensure_session_started();
    $_SESSION['user_id'] = (int) $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['user'] = $user['username'];

    return true;
}

function require_authentication(): void
{
    ensure_session_started();

    if (!isset($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }
}

function redirect_if_authenticated(): void
{
    ensure_session_started();

    if (isset($_SESSION['user_id'])) {
        header('Location: /dashboard.php');
        exit;
    }
}

function logout_and_redirect(): void
{
    ensure_session_started();

    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();

    header('Location: /login.php');
    exit;
}
