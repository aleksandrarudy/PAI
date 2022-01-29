<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('main', 'DefaultController');
Routing::get('register', 'SecurityController');
Routing::get('mainPage', 'DefaultController');
Routing::get('dashboard', 'ImageController');
Routing::get('categories', 'ImageController');
Routing::get('articles', 'ArticleController');
Routing::get('articleSingle', 'ArticleController');
Routing::get('profile', 'DefaultController');
Routing::get('editProfile', 'DefaultController');
Routing::get('image', 'ImageController');
Routing::post('login', 'SecurityController');
Routing::post('addImage', 'ImageController');
Routing::post('addArticle', 'ArticleController');
Routing::post('search', 'ImageController');
Routing::post('logout', 'SecurityController');

Routing::run($path);