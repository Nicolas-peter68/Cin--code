<?php

namespace App\Models;

class ActorsModel extends GeneralModel{
    public function getActorById($id)
    {
        $sql = "SELECT * FROM artistes, artiste_role WHERE artistes.id=? AND id_role=1 AND artistes.id=artiste_role.id_artiste";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }
    public function getAllActors()
    {
        $sql = "SELECT * FROM artistes, artiste_role WHERE id_role=1 AND artistes.id=artiste_role.id_artiste";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}