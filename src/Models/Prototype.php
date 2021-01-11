<?php


namespace App\Models;



use App\Controllers\PageController;

class Prototype extends UsersModel

{

    public function randomstr($length){
            $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
            return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    public function reqQuery($query, $params = false){
           if($params){
               $req = $this->pdo->prepare($query);
               $req->execute($params);
           }else{
               $req = $this->pdo->query($query);
           }
            return $req;
    }

    public function idUser(){
            return $this->pdo->lastInsertId();
    }

    public function register($username, $password, $email){
            $password = $_POST['password'];

            $token = $this->randomstr(60);
            $this->reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
                $username,
                $password,
                $email,
                $token
            ]);
            //Session::getInstance()->setFlash('succes', "Un mail de c");
            $user_id = $this->idUser();
            //mail($email, 'Confirm your account', "Pour valider ton compte merci de cliquer ici\n\n http://projet/Cine-code/confirm.php?id=$user_id&token=$token");
            $test = new PageController();
            //$test->loginPage(); redige vers le login
        }

    public function confirmAccount(){
        $confirmation_token = $_POST['confirmation_token'];
        $id = $_POST['id'];

        $this->reqQuery("UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?", [
            $confirmation_token,
            $id
        ]);

    }

    public function confirmFilm($titre, $synopsis, $date)
    {

        $this->reqQuery("INSERT INTO films SET titre = ?, synopsis = ?, date = ?", [
            $titre,
            $synopsis,
            $date
        ]);
        echo "film ajouter";
    }

    /*public function confirm($user_id, $token){
    $user = $this->reqQuery('SELECT * FROM users WHERE id= ?', [$user_id])->fetch();
    if($user && $user->confirmation_token == $token){
        $this->reqQuery('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?', [$user_id]);
        $_SESSION['auth'] = $user;
        return true;
            }
        return false;
    }*/


        /*public function confirmAccount(){

            $id = new Prototype();
            $id->idUser();
            var_dump($id);
            var_dump($id->idUser());
            //en test
        }*/


}