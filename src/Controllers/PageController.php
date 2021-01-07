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
    
        echo "404";
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

    public function registerUser() 
    {
        $userModel = new UsersModel();
        $userModel->registerAccount();
        
    }
}