<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function main()
    {
        $this->render('login');

    }

    public function mainPage() 
    {
        $this->render('mainPage');

    }




}