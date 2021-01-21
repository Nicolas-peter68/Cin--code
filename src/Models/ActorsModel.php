<?php

namespace App\Models;

class ActorsModel extends GeneralModel{
    public function getActorsById($id)
    {
        $sql = "SELECT * FROM artistes WHERE artistes.id=?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }
}