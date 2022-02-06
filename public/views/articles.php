<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/articles.css">
    <link rel="stylesheet" type="text/css" href="/public/css/images-grid.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <title>ARTICLES</title>
</head>
<body>
    <div class="articles-container">
        <?php include('header.php')?>
            <div class="articles">
              <a class="header">ARTICLES</a>
            </div>  
            
            <div class="article">
                <?php foreach($articles as $article): ?>
              <a class="singleArt" id="article-1" href="articleSingle/<?= $article->getIdArticle() ?>">
                <img src="public/img/uploads/<?= $article->getArticlePicture() ?>">
                <div>
                  <h1 class="art-title"><?= $article->getTitle() ?></h1>
                </div>
              </a>
                <?php endforeach; ?>
            </div>

    </div>
    
</body>
</html>