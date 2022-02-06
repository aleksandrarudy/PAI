<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/public/css/article.css">
  <link rel="stylesheet" type="text/css" href="/public/css/header.css">
  <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
  <title>ARTICLE</title>
</head>
<body>
  <div class="article-container">
      <?php include('header.php')?>
      <?php if (isset($article)) : ?>
    <div class="atricle-title-background">

        <img src="/public/img/uploads/<?= $article->getArticlePicture() ?>" class="poster">

        <h1><?= $article->getTitle() ?></h1>

    </div>
    <div class="atricle-content">
        <a class="content"><?= $article->getContent() ?></a>

    </div>
      <?php endif; ?>

  </div>

</body>
</html>