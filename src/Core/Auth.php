<?php
namespace App\Core;

class Auth {
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login($user) {
        self::startSession();
        $_SESSION['user'] = $user;
    }

    public static function logout() {
        self::startSession();
        unset($_SESSION['user']);
        session_destroy();
    }

    public static function getUser() {
        self::startSession();
        return $_SESSION['user'] ?? null;
    }

    public static function isLoggedIn() {
        return self::getUser() !== null;
    }

    public static function isAdmin() {
        $user = self::getUser();
        return $user && isset($user['role']) && $user['role'] === 'admin';
    }

    public static function requireLogin() {
        self::startSession();
        if (!self::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }
    }

    public static function requireAdmin() {
        self::startSession();
        if (!self::isAdmin()) {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
}
