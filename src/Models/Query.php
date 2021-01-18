<?php


namespace App\Models;



use App\Controllers\PageController;

class Query extends MoviesModel

{
    
    public function randomstr($length){
            $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
            return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    public static function reqQuery($query, $params = false)
    {
        if ($params) {

            $req = GeneralModel::getPDO()->prepare($query);
            $req->execute($params);
        } else {
            $req = GeneralModel::getPDO()->query($query);
        }
        return $req;
    }

    
}