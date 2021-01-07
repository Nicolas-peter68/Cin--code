<?php


namespace App\Models;


class UsersModel extends GeneralModel{

    public function __construct() {
        parent::__construct();
    }

    public function userControl(){
        if($_POST['username']){
           
           
            
            
        }
    }
  
    public function registerAccount(){
        if($_POST['username']){
             $sql = 'select id FROM users WHERE username=?';
             $req = $this->pdo->prepare($sql);
             $req->execute([$_POST['username']]);
             $user = $req->fetch();
             if($user){
                echo "Utilisateur déjà utiliser";
                die();
                }
        }
        $sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
        $req = $this->pdo->prepare($sql);
        $req->execute([$_POST['username'], $_POST['password']]);
        return $req->fetch();     
    }

    public function loginAccount(){
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
            $sql = 'SELECT * FROM users WHERE (username = :username)';
            $req = $this->pdo->prepare($sql);
            $req->execute(['username' => $_POST['username']]);
            $user = $req->fetch();



        }
    }   
}

