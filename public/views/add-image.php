<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/articles.css">
    <link rel="stylesheet" type="text/css" href="/public/css/image.css">
    <link rel="stylesheet" type="text/css" href="/public/css/editProfile.css">
    <script src="https://kit.fontawesome.com/c7d1b0ffc1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/preview.js" defer></script>
    <title>ADD-IMAGE</title>
</head>
<body>
<div class="dashboard-container">
    <?php include('header.php')?>
    <section class="add-image">
        <form action="addImage" method="POST" ENCTYPE="multipart/form-data" class="im-container">
            <?php if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <div class="image-container">
                <div class="added-image" id="added-image">
                </div>
                <div class="add-image">
                    <input type="file" name="file" id="file" class="add-image-input">
                    <label for="file">Choose a file</label>
                </div>
            </div>
            <div class="information">
                <div class="image-description">
                    <textarea class="hashtags-and-description" rows="5" name="description" placeholder="Description..."></textarea>
                </div>
                <div class="category-list">
                        <select class="list-button" name="Category" id="category">
                                <option name="list-element" class="list-element" value="">Category</option>
                                <option name="list-element" class="list-element" value="1">Animals</option>
                                <option name="list-element" class="list-element" value="2">People</option>
                                <option name="list-element" class="list-element" value="3">Monochrome</option>
                                <option name="list-element" class="list-element" value="4">Landscape</option>
                                <option name="list-element" class="list-element" value="6">Street Photography</option>
                                <option name="list-element" class="list-element" value="7">Portrait</option>
                                <option name="list-element" class="list-element" value="8">Architecture</option>
                                <option name="list-element" class="list-element" value="9">Macro Photography</option>
                                <option name="list-element" class="list-element" value="10">Product Photography</option>
                        </select>
                </div>
                <div class="image-specification">
                    <img src="public/img/icons/camera-icon.svg">
                    <div class="camera-lens">
                        <a class="camera-specification">Camera: </a>
                        <input class="Camera" name="camera" type="text" placeholder="Camera"><br>
                        <a class="camera-specification">Lens: </a>
                        <input class="Lens" name="lens" type="text" placeholder="Lens">
                    </div>
                </div>
                <div class="image-specification-2">
                    <div class="part">
                        <div class="icons-with-var">
                            <img src="public/img/icons/flash.svg">
                            <input class="var" name="flash" type="text" placeholder="Flash">
                        </div>
                        <div class="icons-with-var">
                            <img src="public/img/icons/aperture.svg">
                            <input class="var" name="aperture" type="text" placeholder="Aperture">
                        </div>
                        <div class="icons-with-var">
                            <img src="public/img/icons/light.svg">
                            <input class="var" name="light" type="text" placeholder="Light">
                        </div>

                    </div>
                    <div class="part">
                        <div class="icons-with-var">
                            <img src="public/img/icons/exposure.svg">
                            <input class="var" name="exposure" type="text" placeholder="Exposure time">
                        </div>
                        <div class="icons-with-var">
                            <img src="public/img/icons/focus.svg">
                            <input class="var" name="focus" type="text" placeholder="Focus length">
                        </div>
                        <div class="icons-with-var">
                            <img src="public/img/icons/iso.svg">
                            <input class="var" name="iso" type="text" placeholder="ISO">
                        </div>

                    </div>
                </div>
                <div class="add-post">
                    <button type="submit" class="add-post-button">Add image</button>
                </div>
            </div>
        </form>
    </section>

</div>

</body>
</html>