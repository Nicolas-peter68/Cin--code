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

    public function getMoviesFromDirector($id)
    {
        $sql = "SELECT DISTINCT films.titre, films.id FROM films, artistes, artiste_role, acteur_film WHERE artistes.id=? AND artiste_role.id_role=2 AND artistes.id=artiste_role.id_artiste AND artistes.id=films.id_artiste";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetchAll();
    }

    public function getAllDirectors()
    {
        $sql = "SELECT * FROM artistes, artiste_role WHERE artiste_role.id_role=2 AND artistes.id=artiste_role.id_artiste";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}