<?php


namespace App\Models;
use App\Controllers\GeneralController;
use App\Controllers\PageController;

class Session extends UsersModel{

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

    public function writeKey($key, $value){
        $_SESSION[$key] = $value;
    }

    public function read($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }



}