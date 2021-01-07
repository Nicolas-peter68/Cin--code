<?php

namespace App\Controllers;




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
    
        

        if(!empty($_POST)){

            

            if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
                $errors['username'] = "Your speudo is not good ";
            } else {

                $sql = 'select id FROM users WHERE username = ?' ;
                $req->prepare($sql);
        
                $req->execute([$_POST['username']]);
        
                $user = $req->fetch();
                if($user){
                    echo 'This username is already take';
        
            }

            if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
                echo "Mot de passe incorrect";
            }


        }
    }


   
    }
}