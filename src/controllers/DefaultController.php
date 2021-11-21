<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login() 
    {
        $this->render('login');

    }

    public function signUp() 
    {
        $this->render('signUp');

    }

    public function mainPage() 
    {
        $this->render('mainPage');

    }

    public function dashboard() 
    {
        $this->render('dashboard');

    }
    public function categories() 
    {
        $this->render('categories');

    }



}