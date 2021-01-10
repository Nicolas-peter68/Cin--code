<?php


namespace App\Models;


class Session extends Prototype{

    static $instance;

    static function getInstance(){
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function __construct()
    {
        session_start();
    }

    public function setFlash($key, $message){
        $_SESSION['flash'][$key] = $message;

    }

    public function hasFlash(){
        return isset($_SESSION['flash']);
    }

    public function getFlash(){
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

}