<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
</head>
<body>
<div class="profile-container">
    <?php include('header.php')?>
    <?php
    var_dump($profile);
    var_dump($user);
    if (isset($profile) && isset($user)) :?>

        <div class="profile">
            <a href="profile" class="profile-picture">
                <img src="/public/img/uploads/<?= $profile->getProfilePicture() ?>">
            </a>
            <div class="user-name-biogram">
                <h2 class="user-name"><?= $user->getUsername() ?></h2>
                <p class="first-sur-name"><?= $profile->getFirstname() ?>  <?= $profile->getSurname() ?></p>
                <p class="biogram"><?= $profile->getBiogram() ?></p>
            </div>
            <div class="edit-button">
                <a href="addUserDetails" class="edit-profile-button">Edit profile</a>
            </div>
            <form class="logout" action="logout" method="POST">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
        <div class="profile-feed">
            <div class="add-post">
                <a href="addImage" class="feed-button">ADD POST</a>
            </div>

            <div class="your-posts">
                <a href="categories" class="feed-button">YOUR POSTS</a>
            </div>

            <div class="add-article">
                <a href="addArticle" class="feed-button">ADD ARTICLE</a>
            </div>

        </div>
    <?php endif; ?>

</div>

</body>
</html>