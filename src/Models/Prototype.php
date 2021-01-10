<?php


namespace App\Models;


class Prototype extends UsersModel

{

    static function redirect(){
        header("Location: $page");
        exit();
    }

    private $db;

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
            $password = password_hash($password, PASSWORD_BCRYPT);

            $token = $this->randomstr(60);
            $this->reqQuery("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
                $username,
                $password,
                $email,
                $token
            ]);

            Session::getInstance()->setFlash('succes', "Un mail de c");
            $user_id = $this->idUser();
            mail($email, 'Confirm your account', "Pour valider ton compte merci de cliquer ici\n\nhttp://projet/Prototype/confirm.php?id=$user_id&token=$token");
            //Prototype::redirect('login.html.twig');
        }

}