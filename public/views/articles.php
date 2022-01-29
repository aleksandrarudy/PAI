<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/articles.css">
    <link rel="stylesheet" type="text/css" href="public/css/images-grid.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <title>ARTICLES</title>
</head>
<body>
    <div class="articles-container">

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
            <div class="articles">
              <p class="header">ARTICLES</p>
            </div>  
            
            <div class="article">
                <?php foreach($articles as $article): ?>
              <div id="article-1">
                <img src="public/img/articles/horizontal-1.jpg">
                <div>
                  <h2><?= $article->getTitle() ?></h2>
                </div>
              </div>
                <?php endforeach; ?>
            </div>

    </div>
    
</body>
</html>