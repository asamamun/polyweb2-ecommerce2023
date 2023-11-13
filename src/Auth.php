<?php

namespace App;

class Auth
{
    public static function checksession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function isUser()
    {
        self::checksession();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            if ($_SESSION['role'] == "1") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function isAdmin()
    {
        self::checksession();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            if ($_SESSION['role'] == "2") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function User()
    {
        self::checksession();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            $user = [
                'id' => $_SESSION['id'],
                'email' => $_SESSION['email'],
                'role' => $_SESSION['role'],
            ];
            return $user;
        } else {
            return false;
        }
    }
    public static function AdminCheck()
    {
        if (!self::isAdmin()) {
            header("location: ../index.php");
        }
    }
    public static function userCheck()
    {
        if (!self::isUser()) {
            header("location: index.php");
        }
    }
}
