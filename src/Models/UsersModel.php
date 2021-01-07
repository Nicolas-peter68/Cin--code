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
        
        $sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
        $req = $this->pdo->prepare($sql);
        $req->execute([$_POST['username'], $_POST['password']]);
        return $req->fetch();
    }

    public function loginAccount(){
        
    }
}

