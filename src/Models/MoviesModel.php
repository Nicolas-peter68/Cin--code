<?php


namespace App\Models;
use App\Models\Query;

class MoviesModel
{

    private static $data;
    private static $errors = [];

    public function __construct($data) {
        self::$data = $data;
    }


    public function addFilm() {
       
        $movies = new Confirm($_POST);
        $movies->alpha('titre', "Le film n'a pas un bon nom");
        if ($movies->ifConfirmed()) {
            Confirm::checkUniq('titre', 'films', "Ce film à déjà été ajouter");
            Query::reqQuery("");
        }
    }












}