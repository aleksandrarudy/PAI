<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <a class="logo" href="mainPage">
            <img src="public/img/logo.svg">
        </a>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class ="messages">
                    <?php if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input class="login-input" name="email" type="text" placeholder="email">
                <input class="login-input" name="password" type="password" placeholder="password">
                <button type="submit" class="logsig" href="public/views/dashboard" >login</button>

            </form> 
        </div> 
    </div> 
</body>
</html>