<?php

namespace App\Controllers;

use App\Models\MoviesModel;
use App\Models\UsersModel;
use App\Models\ActorsModel;
use App\Models\DirectorsModel;


class PageController extends GeneralController
{

    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $model = new MoviesModel();
        $movies = $model->getAllMovies();
        $template = $this->twig->load('index.html.twig');
        echo $template->render(["movies"=>$movies]);
    }

    public function error404()
    {
        $template = $this->twig->load('404.html.twig');
        echo $template->render();
    }

    public function movie()
    {
        $template = $this->twig->load('movie.html.twig');
        echo $template->render();

    }

    public function registerPage()
    {
        $template = $this->twig->load('register.html.twig');
        echo $template->render();
    }

    public function loginPage()
    {
        $template = $this->twig->load('login.html.twig');
        echo $template->render();

    }

    public function moviePage($id)
    {
        $model = new MoviesModel();
        $movie = $model->getMovieById($id);
        $actors = $model->getActorsFromMovie($id);
        $template = $this->twig->load('movie.html.twig');
        echo $template->render(["movie"=>$movie, "actors"=>$actors]);
    }
    public function newsPage()
    {

        $template = $this->twig->load('news.html.twig');
        echo $template->render();
    }

    public function actorPage($id)
    {
        $model = new ActorsModel();
        $actors = $model->getActorById($id);
        $template = $this->twig->load('actor.html.twig');
        echo $template->render(["actors"=>$actors]);
    }

    public function allActorPage()
    {
        $model = new ActorsModel();
        $actors = $model->getAllActors();
        $template = $this->twig->load('AllActors.html.twig');
        echo $template->render(["actors"=>$actors]);
    }

    public function directorPage($id)
    {
        $model = new DirectorsModel();
        $director = $model->getDirectorsById($id);
        $template = $this->twig->load('director.html.twig');
        echo $template->render(["director"=>$director]);
    }
    
    public function allDirectorsPage()
    {
        $model = new DirectorsModel();
        $directors = $model->getAllDirectors();
        $template = $this->twig->load('AllDirectors.html.twig');
        echo $template->render(["directors"=>$directors]);
    }

    public function registerUser() 
    {
        $userModel = new UsersModel();
        $userModel->registerAccount();
        
    }
}