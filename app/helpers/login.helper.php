<?php

class loginHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        loginHelper::init();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_Usuario'] = $user->usuario; 
    }

    public static function logout() {
        loginHelper::init();
        session_destroy();
    }

    public static function verify() {
        loginHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }
    public static function verifyAdmin() {
        loginHelper::init();
        
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    
        if ($_SESSION['USER_ID'] !== 1) {
            header('Location: ' . BASE_URL . 'product');
            die();
        }
    }
}