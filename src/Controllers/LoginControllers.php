<?php


namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\RegisterModels;

class LoginControllers
{

    public function ifConfirmed(){
        return empty($this->errors); //tableau vide = true
    }

    public function loginUser(){

        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
            $usersModel = new UsersModel();
            $usersModel->checkExist($_POST['username']);
            if($this->ifConfirmed()){
                $usersModel = new UsersModel();
                $usersModel->loginAccount();

            }else {
                echo "Mot de passe ou nom utilisateur incorrect";
            }
        }
    }

}