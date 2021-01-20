<?php

namespace App\Models;

class MoviesModel extends GeneralModel
{
    public function getMovieById($id)
    {
        $sql = "SELECT * FROM films, artistes WHERE films.id=? AND films.id_artiste=artistes.id";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }

    public function getActorsFromMovie($id)
    {
        $sql = "SELECT artistes.id, artistes.nom, artistes.prenom FROM films, artistes, acteur_film WHERE films.id=? AND films.id=acteur_film.id_film AND artistes.id=acteur_film.id_acteur";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetchAll();
    }

  public function getAllMovies()
    {
        $sql = "SELECT * FROM films";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

