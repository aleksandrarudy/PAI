<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function main()
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


    public function categories() 
    {
        $this->render('categories');

    }
    public function articles() 
    {
        $this->render('articles');

    }
    public function articleSingle()
    {
        $this->render('articlesSingle');

    }
    public function profile()
    {
        $this->render('profile');

    }
    public function editProfile()
    {
        $this->render('editProfile');

    }
    public function image()
    {
        $this->render('image');

    }
    public function addImage()
    {
        $this->render('addImage');

    }


}