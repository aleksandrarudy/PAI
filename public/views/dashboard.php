<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/images-grid.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>PIXAGE</title>
</head>
<body>
    <div class="dashboard-container">

            <header>
                <a href="dashboard">
                    <img src="public/img/logo-gradient.svg">
                </a>

                <div class="search-bar">

                        <input class="search-input" placeholder="search">
                        <i class="fas fa-search"></i>

                </div>
                <a href="profile" class="profil">
                    <i class="fas fa-user"></i>
                </a>
            </header>
            <div class="gallery">
                <?php foreach($images as $image): ?>
                      <a class="gallery__item gallery__item--1" href="image">
                          <img src="public/img/uploads/<?= $image->getPicture() ?>" class="gallery__img" alt="Image 1">
                      </a>
                <?php endforeach; ?>
            </div>

    </div>
    
</body>
<template id="image-template">
    <a class="gallery__item gallery__item--1" href="image">
        <img src="" class="gallery__img" alt="Image 1">
    </a>
</template>


</html>