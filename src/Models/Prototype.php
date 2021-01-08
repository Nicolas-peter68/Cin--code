<?php


namespace App\Models;


class Prototype extends UsersModel
{



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

}