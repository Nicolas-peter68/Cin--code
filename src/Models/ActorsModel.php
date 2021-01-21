<?php

namespace App\Models;

class ActorsModel extends GeneralModel{
    public function getActorsById($id)
    {
        $sql = "SELECT * FROM artistes, artiste_role WHERE artistes.id=? AND id_role=1 AND artistes.id=artiste_role.id_artiste";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }
}