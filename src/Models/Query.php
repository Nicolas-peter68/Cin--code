<?php


namespace App\Models;



use App\Controllers\PageController;

class Query extends Confirm {

    public static function reqQuery($query, $params = false)
    {
        if ($params) {

            $req = self::getPDO()->prepare($query);
            $req->execute($params);
        } else {
            $req = self::getPDO()->query($query);
        }
        return $req;
    }










}
