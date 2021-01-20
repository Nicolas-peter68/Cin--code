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

    //public function getAllMovies()
  //  {
     //   $sql = "SELECT * FROM films, artistes WHERE films.id_artiste=artistes.id";
     //   $req = $this->pdo->prepare($sql);
      //  $req->execute();
      //  return $req->fetchAll();
  //  }

  public function getArtistById($id)
  {
      $sql = "SELECT * FROM films, artistes WHERE artiste.id=? AND films.id_artiste=artistes.id";
      $req = $this->pdo->prepare($sql);
      $req->execute([$id]);
      return $req->fetch();
  }
  public function getAllMovies()
    {
        $sql = "SELECT * FROM films";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

