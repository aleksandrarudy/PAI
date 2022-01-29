<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/images-grid.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>CATEGORY</title>
</head>
<body>
    <div class="dashboard-container-w-title">

        <header>
            <a href="/dashboard">
                <img src="/public/img/logo-gradient.svg">
            </a>

            <div class="search-bar">

                <input class="search-input" placeholder="search">
                <i class="fas fa-search"></i>

            </div>
            <a href="profile" class="profil">
                <i class="fas fa-user"></i>
            </a>
        </header>
        <div class="category">
              <p class="header">CATEGORY/</p>
        </div>
        <div class="gallery_categories">
                <?php foreach($images as $image): ?>
                    <a class="gallery-item" href="/image/<?= $image->getIdImg() ?>">
                        <img src="/public/img/uploads/<?= $image->getPicture() ?>" class="image-item">
                    </a>
                <?php endforeach; ?>

        </div>


    </div>
    
</body>
<template id="image-template">
    <a class="gallery-item" href="image">
        <img src="" class="image-item">
    </a>
</template>


</html>