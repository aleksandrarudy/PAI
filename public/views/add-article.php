<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/image.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add-article.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>

    <title>ADD-ARTICLE</title>
</head>
<body>
<div class="dashboard-container">
    <?php include('header.php')?>
    <section class="add-article-page">
        <form action="addArticle" method="POST" ENCTYPE="multipart/form-data"  class="add-article-container">
            <?php if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <div class="title">
                <a class="title">TITLE</a>
                <input class="article-title" name="title" type="text" placeholder="Title">
            </div>
            <div class="add-poster">
                <input type="file" name="a-file" id="a-file" class="add-poster-input">
                <label for="a-file">Choose a file</label>
            </div>
            <div class="article-content">
                <textarea class="content" rows="20" name="content" placeholder="content..."></textarea>
            </div>
            <div class="add-article-button">
                <button type="submit" class="add-article-submit">Add article</button>
            </div>
        </form>
    </section>

</div>

</body>
</html>