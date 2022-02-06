<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/articles.css">
    <link rel="stylesheet" type="text/css" href="/public/css/editProfile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/images-grid.css">

    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <title>EDIT PROFILE</title>
</head>
<body>
<div class="edit-profile-container">
    <?php include('header.php')?>

        <form class="edit-profile" action="addUserDetails" method="POST" ENCTYPE="multipart/form-data">
            <?php if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>

            <div class="picture-and-biogram">
                <a class="profile-picture">
                    <img src="public/img/uploads/<?= $profile->getProfilePicture() ?>">
                </a>
                <div class="biogram">
                    <h2 class="user-name"><?= $user->getUsername() ?></h2>
                    <input class="user-profile-pic" type="file" name="p-file" id="p-file">
                    <label for="p-file">Edit profile picture</label>
                </div>
            </div>
            <div class="edit-profile-data">
                <div class="data">
                    <a>Firstname</a>
                    <input class="data-input" name="firstname" type="text">
                </div>
                <div class="data">
                    <a>Surname</a>
                    <input class="data-input" name="surname" type="text">
                </div>
                <div class="data">
                    <a>Biogram</a>
                    <textarea class="data-input" rows='2' name="biogram" type="text"></textarea>
                </div>
                <div class="data">
                    <button type="submit" class="delete-button">Delete account</button>
                    <button type="submit" class="save-button">Save changes</button>
                </div>

            </div>
        </form>


</div>

</body>
</html>