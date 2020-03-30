<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Forum">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="img/logo.png" alt="logo" />
        </a>
        <nav>
            <ul class="nav__links">
                <li><a href="index.php">Home</a></li>
                <li><a href="chat.php">Chat</a></li>
                <li><a href="report.php">Report a problem</a></li>
            </ul>
        </nav>
        <div class="header-login">   
            <?php
                if(isset($_SESSION['userId'])){
                    echo '<p>'.$_SESSION['username'].'
                        <form action="includes/logout.inc.php" method="POST">
                            <button type="submit" name="logout">Logout</button>
                        </form>';
                }else{
                    echo '<form action="includes/login.inc.php" method="POST">
                            <input type="text" name="mailuid" placeholder="Username/E-mail">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" name="login-submit">Login</button>
                        </form>
                        <a href="signup.php" class="register">Signup</a>';
                }
            ?> 
        </div>
    </header>
</body>
</html>