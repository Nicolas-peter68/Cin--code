<?php

namespace App\Models;

class DirectorsModel extends GeneralModel{
    public function getDirectorsById($id)
    {
        $sql = "SELECT * FROM artistes, artiste_role WHERE artistes.id=? AND id_role=2 AND artistes.id=artiste_role.id_artiste";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }
}