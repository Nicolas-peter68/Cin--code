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
        Confirm::checkUniq('title', 'films', "Ce film à déjà été ajouter");

    }












}