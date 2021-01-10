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
        $validator = new Confirm($_POST);
        $validator->usernameAlpha('username', "Votre pseudo n'est pas alphanumeriq");
        if ($validator->ifConfirmed()) {
            $validator->checkUniq('username', 'users', "Pseudo non disponnble");
        }

        $validator->checkEmailFilter('email', "Votre email n'est pas un email");
        if ($validator->ifConfirmed()) {
            $validator->checkUniq('email', 'users', "Email non disponnible");
        }
        $validator->checkPasswordConfirm('password', "Les mots de passe ne correspondent pas");
        if ($validator->ifConfirmed()) {



            $proto = new Prototype();
            $proto->register($_POST['username'], $_POST['password'], $_POST['email'] );
            $session = new Session();
            $session->setFlash('succes', "confirmation envoyer");

            //$proto->reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?", [$_POST['username'], $_POST['password'], $_POST['email']]);
            echo "votre compte a bien été crée";

        } else {
            $errors = $validator->getErrors();
            echo "erreur";
        }


    }



























    public function loginAccount()
    {
        if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
            $login = new Prototype();
            $user = $login->reqQuery('select id FROM users WHERE username=?', [$_POST['username']])->fetch();
            if ($user) {
                if ($_POST['password']) {
                    $login = new Prototype();
                    $user = $login->reqQuery('select id FROM users WHERE password=?', [$_POST['password']])->fetch();
                    $_SESSION['auth'] = $user;
                    if ($user) {
                        echo "vous ete connecter";
                    } else {
                        echo "Mot de passe incorrect";
                    }
                }
            }
        }
    }
}
