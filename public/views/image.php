<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/articles.css">
    <link rel="stylesheet" type="text/css" href="/public/css/image.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>

    <title>IMAGE</title>
</head>
<body>
<div class="dashboard-container">

    <header>
        <a href="/dashboard">
            <img src="/public/img/logo-gradient.svg">
        </a>

        <div class="search-bar">

                <input class="search-input" placeholder="search">
                <i class="fas fa-search"></i>

        </div>
        <a href="/profile" class="profil">
            <i class="fas fa-user"></i>
        </a>
    </header>
    <?php if (isset($image)) : ?>
    <div class="im-container">
        <div class="image-container">
            <div class="image">
                <img src="/public/img/uploads/<?= $image->getPicture() ?>" class="image-view">
            </div>
        </div>
        <div class="information">
            <div class="author">
                <a href="/profile" class="profile-picture">
                    <img src="/public/img/uploads/vladimir-kozhevnikov-VwZuLjeTqqo-unsplash.jpg">
                </a>
                <a href="/profile" class="user-name">
                    <h2 class="user-name">User-name</h2>
                </a>
            </div>
            <div class="image-description">
                <p class="description"><?= $image->getDescription() ?></p>
            </div>

            <div class="image-specification">
                <img src="/public/img/icons/camera-icon.svg">
                <div class="camera-lens">
                    <p class="camera-specification">Camera: <?= $image->getCamera() ?></p>
                    <p class="camera-specification">Lens: <?= $image->getLens() ?></p>
                </div>
            </div>
            <div class="image-specification-2">
                <div class="part">
                    <div class="icons-with-var">
                        <img src="/public/img/icons/flash.svg">
                        <p class="var">Flash: <?= $image->getFlash() ?></p>
                    </div>
                    <div class="icons-with-var">
                        <img src="/public/img/icons/aperture.svg">
                        <p class="var">Aperture: <?= $image->getAperture() ?></p>
                    </div>
                    <div class="icons-with-var">
                        <img src="/public/img/icons/light.svg">
                        <p class="var">Light: <?= $image->getLight() ?></p>
                    </div>

                </div>
                <div class="part">
                    <div class="icons-with-var">
                        <img src="/public/img/icons/exposure.svg">
                        <p class="var">Exposure: <?= $image->getExposure() ?></p>
                    </div>
                    <div class="icons-with-var">
                        <img src="/public/img/icons/focus.svg">
                        <p class="var">Focus: <?= $image->getFocus() ?></p>
                    </div>
                    <div class="icons-with-var">
                        <img src="/public/img/icons/iso.svg">
                        <p class="var">ISO: <?= $image->getIso() ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

</body>
</html>