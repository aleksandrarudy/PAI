
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>SIGN UP</title>
</head>
<body>
    <div class="container">
        <a class="logo" href="mainPage">
            <img src="public/img/logo.svg">
        </a>
        <div class="login-container">
            <form class="login" action="register" method="POST">
                <input class="login-input" name="user_name" type="text" placeholder="user name">
                <input class="login-input" name="email" type="text" placeholder="email">
                <input class="login-input" name="password" type="password" placeholder="password">
                <input class="login-input" name="repeat_password" type="password" placeholder="repeat password">
                <button class="logsig">sign up</button>
            </form> 
        </div> 
    </div> 
</body>
</html>