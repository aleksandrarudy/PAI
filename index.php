<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('main', 'DefaultController');
Routing::get('signUp', 'DefaultController');
Routing::get('mainPage', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::get('categories', 'DefaultController');
Routing::get('articles', 'DefaultController');
Routing::get('articleSingle', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('editProfile', 'DefaultController');
Routing::get('image', 'DefaultController');
Routing::get('addImage', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addImage', 'ImageController');
Routing::run($path);