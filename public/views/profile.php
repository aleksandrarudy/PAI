<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="public/css/images-grid.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
</head>
<body>
<div class="profile-container">

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
        <div class="profile">
            <a href="profile" class="profile-picture">
                <img src="public/img/uploads/vladimir-kozhevnikov-VwZuLjeTqqo-unsplash.jpg">
            </a>
            <div class="user-name-biogram">
                <h2 class="user-name">User-name</h2>
                <p class="first-sur-name">User Name</p>
                <p class="biogram">biogram biogram <br> biogram </p>
            </div>
            <div class="edit-button">
                <a href="editProfile" class="edit-profile-button">Edit profile</a>
            </div>
        </div>
        <div class="profile-feed">
            <div class="add-post">
                <a href="addImage" class="feed-button">ADD POST</a>
            </div>
            <div class="your-posts">
                <a href="categories" class="feed-button">YOUR POSTS</a>
            </div>
            <div class="saved-posts">
                <a href="categories" class="feed-button">SAVED POSTS</a>
            </div>

        </div>

</div>

</body>
</html>