<?php


namespace App\Models;




class UsersModel extends GeneralModel
{
    public function registerAccount(){
        $inProcces = New Confirm($_POST);
        $inProcces->alpha('username', "Votre pseudo n'est pas alphanumeriq");
        if ($inProcces->ifConfirmed()) {
            Confirm::checkUniq('username', 'users', "Pseudo non disponnble");
        }
        $inProcces->checkEmailFilter('email', "Votre email n'est pas un email");
        if ($inProcces->ifConfirmed()) {
            Confirm::checkUniq('email', 'users', "Email non disponnible");
        }
        $inProcces->checkPasswordConfirm('password', "Les mots de passe ne correspondent pas");
        if ($inProcces->ifConfirmed()) {
            Query::reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?", [$_POST['username'], $_POST['password'], $_POST['email']]);
            echo "votre compte a bien été crée";
        } else {
            $errors = $inProcces->getErrors();
            var_dump($inProcces->getErrors());
            var_dump($errors);
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
                    $_SESSION['auth'] = $user;
                    $_SESSION['flash']['success'] = 'vous êtes maintenant connecté';
                }
                else {echo "mot de passe incorrect";}
            }else{
                echo "Veuillez entrez un mdp";}
        }
    }

    public function addFilm() {
        Confirm::checkUniq('title', 'films', "Ce film à déjà été ajouter");
        $movies = new Confirm($_POST);
        $movies->alpha('titre', "Le film n'a pas un bon nom");
        if ($movies->ifConfirmed()) {
            Confirm::checkUniq('titre', 'films', "Ce film à déjà été ajouter");
            Query::reqQuery("INSERT INTO films SET titre = ?, synopsis = ?, date = ?", [$_POST['titre'], $_POST['synopsis'], $_POST['date']]);
            echo "le film à  été ajouter";
        }
    }
}
