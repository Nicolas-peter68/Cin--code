<?php

namespace App\Controllers;

use App\Models\UsersModel;


class PageController extends GeneralController
{

    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $template = $this->twig->load('index.html.twig');
        echo $template->render();
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

    public function registerUser(){

    }

    public function moviePage()
    {
        $template = $this->twig->load('movie.html.twig');
        echo $template->render();

    }

    public function newsPage()
    {
        $template = $this->twig->load('news.html.twig');
        echo $template->render();

    }

    public function actorPage()
    {
        $template = $this->twig->load('actor.html.twig');
        echo $template->render();

    }

    public function directorPage()
    {
        $template = $this->twig->load('director.html.twig');
        echo $template->render();

    }
}