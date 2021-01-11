<?php


namespace App\Models;




class UsersModel extends GeneralModel
{

    public function __construct()
    {
        parent::__construct();
    }


    public function registerAccount()
    {
        $account = new Confirm($_POST);
        $account->usernameAlpha('username', "Votre pseudo n'est pas alphanumeriq");
        if ($account->ifConfirmed()) {
            $account->checkUniq('username', 'users', "Pseudo non disponnble");
        }
        $account->checkEmailFilter('email', "Votre email n'est pas un email");
        if ($account->ifConfirmed()) {
            $account->checkUniq('email', 'users', "Email non disponnible");
        }
        $account->checkPasswordConfirm('password', "Les mots de passe ne correspondent pas");
        if ($account->ifConfirmed()) {

            $proto = new Prototype();
            $proto->register($_POST['username'], $_POST['password'], $_POST['email'] );
            $session = new Session();
            $session->setFlash('succes', "confirmation envoyer");
            echo "votre compte a bien été crée";
        } else {
            $errors = $account->getErrors();
            echo "erreur";
        }


    }


    public function loginAccount()
    {
        $proto = new Prototype();
        $user = $proto->reqQuery('select * FROM users WHERE username=?', [$_POST['username']])->fetch();
        if($user){
            if ($_POST['password']) {
                $user = $proto->reqQuery('select * FROM users WHERE password=?', [$_POST['password']])->fetch();
                if($user){
                    echo "vous êtes connecter";
                    return $_SESSION['auth'] = $user->fetch();
                }
                else {echo "mot de passe incorrect";}
            }else{
                echo "Veuillez entrez un mdp";}

        }

    }

    /*public function accountConfirm(){
        //Voici ma super idée ItSemih :DD
        $confirm = new Confirm($_POST);
        $user = new Prototype();
        $confirmation_token = $_POST['confirmation_token'];
        $id = $_POST['id'];
        $confirm->strToken('confirmation_token', "Erreur token");
        if ($confirm->ifConfirmed()){
            if($_POST['id']){
                $user->confirmAccount();
                echo "comt confirmer";
            }

        }


    }*/

    public function addFilm(){
        $proto = new Prototype();
        $proto->confirmFilm($_POST['titre'], $_POST['synopsis'], $_POST['datee'] );
    }


}
