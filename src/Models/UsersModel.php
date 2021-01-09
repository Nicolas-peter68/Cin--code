<?php


namespace App\Models;




class UsersModel extends GeneralModel{

    public function __construct() {
        parent::__construct();
    }



  
    public function registerAccount(){
        $test = new Confirm($_POST);

        //$test->checkIf('username', '$proto = new Prototype()', 'users', 'Erreur');
        //var_dump($test);
        $errors = array();
        if(!empty($_POST)){
            if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
                $errors['username'] = "Pseudo invalide veuillez réessayer";
                echo "Pseudo invalide veuillez réessayer";

            } else {
                 $proto = new Prototype();
                 $user = $proto->reqQuery('select id FROM users WHERE username=?',[$_POST['username']])->fetch();
                 if($user){
                    $errors['username'] = 'Nom utilisateur déjà utiliser !';
                    echo 'Nom utilisateur déjà utiliser !';
                    }
            }

            if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Adresse email invalide !';
            } else {
                $proto = new Prototype();
                $email = $proto->reqQuery('select id FROM users WHERE email=?',[$_POST['email']])->fetch();
                if($email){
                    $errors['email'] = 'Adresse email déjà utiliser !';
                    echo 'Adresse email déjà utiliser !';
                }
            }

            if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
                $errors['password'] = 'Les mots de passe ne correspondent pas !';
                echo 'Les mots de passe ne correspondent pas !';
            }
            if(empty($errors)) {
                $proto = new Prototype();
                $proto->reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?", [$_POST['username'], $_POST['password'], $_POST['email']]);
                echo "votre compte a bien été crée";
            }
        }
    }

    public function loginAccount(){
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
            $login = new Prototype();
            $user = $login->reqQuery('select id FROM users WHERE username=?',[$_POST['username']])->fetch();
            if($user){
                if($_POST['password']){
                    $sql = 'select id FROM users WHERE password=?';
                    $req = $this->pdo->prepare($sql);
                    $req->execute([$_POST['password']]);
                    $user = $req->fetch();
                    $_SESSION['auth'] = $user;
                    if($user){
                        echo "vous ete connecter";
                    }
                    else{
                        echo "Mot de passe incorrect";
                    }
                }
            }


        }
    }   
}

