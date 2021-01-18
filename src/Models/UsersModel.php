<?php


namespace App\Models;




class UsersModel extends GeneralModel
{
    public function registerAccount(){
        $inProcces = New Confirm($_POST);
        $inProcces->usernameAlpha('username', "Votre pseudo n'est pas alphanumeriq");
        if ($inProcces->ifConfirmed()) {
            $inProcces->checkUniq('username', 'users', "Pseudo non disponnble");
        }
        $inProcces->checkEmailFilter('email', "Votre email n'est pas un email");
        if ($inProcces->ifConfirmed()) {
            $inProcces->checkUniq('email', 'users', "Email non disponnible");
        }
        $inProcces->checkPasswordConfirm('password', "Les mots de passe ne correspondent pas");
        if ($inProcces->ifConfirmed()) {
            Query::reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?", [$_POST['username'], $_POST['password'], $_POST['email']]);
            echo "votre compte a bien été crée";
        } else {
            $errors = $inProcces->getErrors();
            var_dump($inProcces->getErrors());
            echo "erreur";
        }
    }

    public function loginAccount(){
        $user = Query::reqQuery('select * FROM users WHERE username=?', [$_POST['username']])->fetch();
        if($user){
            if ($_POST['password']) {
                $user = Query::reqQuery('select * FROM users WHERE password=?', [$_POST['password']])->fetch();
                if($user){
                    echo "vous êtes connecter";
                }
                else {echo "mot de passe incorrect";}
            }else{
                echo "Veuillez entrez un mdp";}
        }
    }
}
