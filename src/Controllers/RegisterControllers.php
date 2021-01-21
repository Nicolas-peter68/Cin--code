<?php


namespace App\Controllers;


use App\Models\UsersModel;

class RegisterControllers extends GeneralController
{
    private $errors = [];

    public function registerUser(){
        if(!empty($_POST)){
            $this->alpha($_POST['username']);
            if($this->ifConfirmed()){
                $user = new UsersModel();
                $user->checkUniq($_POST['username']);

            }
            var_dump($this->ifConfirmed());
            $this->checkEmailFilter();
            if($this->ifConfirmed()){
                $user = new UsersModel();
                $user->checkEmail($_POST['email']);
                }
            $this->checkPasswordConfirm();
            if($this->ifConfirmed()) {
                $user = new UsersModel();
                $user->registerAccount();
                }
            }
        }



    public function checkEmailFilter(){
        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Ceci n'est pas un mail";
            echo "C'est pas un mail";
        }
    }

    public function alpha($username) {
        if (empty($username) || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            $this->errors['username'] = "Votre pseudo n'est pas alphanumeriq";
            echo "Votre pseudo n'est pas alphanumeriq";
        }
    }

    public function checkPasswordConfirm(){
        if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
            $this->errors['password_confirm'] = "Les mots de passes ne correspondent pas";
            echo " mot de passe faux";
            }
        }


    public function ifConfirmed(){
        return empty($this->errors); //tableau vide = true
    }
}

