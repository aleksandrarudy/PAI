<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('main', 'DefaultController');
Routing::get('signUp', 'DefaultController');
Routing::get('mainPage', 'DefaultController');
Routing::get('dashboard', 'ImageController');
Routing::get('categories', 'ImageController');
Routing::get('articles', 'DefaultController');
Routing::get('articleSingle', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('editProfile', 'DefaultController');
Routing::get('image', 'ImageController');
Routing::get('addImage', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addImage', 'ImageController');
Routing::post('search', 'ImageController');

Routing::run($path);