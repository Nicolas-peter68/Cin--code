<?php


namespace App\Models;




class UsersModel extends GeneralModel{

    public function __construct() {
        parent::__construct();
    }

    

  
    public function registerAccount(){
        $validator = new Validator($_POST);
        $validator->isAlpha('username', "Votre pseudo n'est pas alphanumeriq");
        $validator->isUniq('email', 'users', "Pseudo non disponnble");
        var_dump($validator);

        
        
        
        
        /*if(!empty($_POST)){
            $test = new Confirm($_POST);
            $test->alnumeriq('username', "Nom utilisateur invalide");
            $test->checkUnique('username', '$proto = new Prototype()', 'users', "Pseudo déjà utiliser");
            $test->checkEmailFilter('email', "Email invalide");
            $test->checkUnique('email', '$proto = new Prototype()', 'users', "Email déjà utiliser");
            $test->checkPasswordConfirm('password', "Vous devez rentrer un mot de passe valide");
            $test->ifConfirmed();
            var_dump($test);
            var_dump($test->ifConfirmed());*/

            // test de mon idée 
            /*$test = new Confirm($_POST);
            //$test->alnumeriq('username', "Nom utilisateur invalide");
            $test->checkUnique('username', '$proto = new Prototype()', 'users', "Pseudo déjà utiliser");

            
        
            /*if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
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
            }*/
            /*if(empty($errors)) {
                $proto = new Prototype();
                $proto->reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?", [$_POST['username'], $_POST['password'], $_POST['email']]);
                echo "votre compte a bien été crée";
            }*/
        }


    /*public function loginAccount(){
        if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
            $login = new Prototype();
            $user = $login->reqQuery('select id FROM users WHERE username=?',[$_POST['username']])->fetch();
            if($user){
                if($_POST['password']){
                    $login = new Prototype();
                    $user = $login->reqQuery('select id FROM users WHERE password=?',[$_POST['password']])->fetch();
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
    }   */
}

