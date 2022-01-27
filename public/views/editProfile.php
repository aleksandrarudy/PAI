<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/articles.css">
    <link rel="stylesheet" type="text/css" href="public/css/editProfile.css">
    <link rel="stylesheet" type="text/css" href="public/css/images-grid.css">

    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <title>EDIT PROFILE</title>
</head>
<body>
<div class="edit-profile-container">

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

        <div class="edit-profile">
            <div class="picture-and-biogram">
                <div class="profile-picture">
                    <img src="public/img/uploads/vladimir-kozhevnikov-VwZuLjeTqqo-unsplash.jpg">
                </div>
                <div class="biogram">
                    <h2 class="user-name">User-name</h2>
                    <a class="edit-user-picture">edit profile picture</a>
                </div>
            </div>
            <div class="edit-profile-data">
                <div class="data">
                    <a>User name</a>
                    <input class="data-input" name="User name" type="text">
                </div>
                <div class="data">
                    <a>First name and Surname</a>
                    <input class="data-input" name="First name and Surname" type="text">
                </div>
                <div class="data">
                    <a>Biogram</a>
                    <input class="data-input" name="Biogram" type="text">
                </div>
                <div class="data">
                    <a>Email</a>
                    <input class="data-input" name="Email" type="text">
                </div>
                <div class="data">
                    <a>Change password</a>
                    <input class="data-input" name="Change password" type="password">
                </div>
                <div class="data">
                    <a class="delete-button">Delete account</a>
                    <a href="profile" class="save-button">Save changes</a>
                </div>

            </div>
        </div>


</div>

</body>
</html>