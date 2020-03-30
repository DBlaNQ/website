<?php
    include "header.php";
?>
<main>
    <div id="registerform">
        <h1>Signup</h1>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p>One or more fields were empty!';
                }
                else if($_GET['error'] == "passcheck"){
                    echo '<p>Passwords did not match!';
                }
                else if($_GET['error'] == "userTaken"){
                    echo '<p>Username is already taken!';
                }
            } 
            else if($_GET['signup'] == "success"){
                echo '<p>Successfuly Signed Up!';
            }
        ?>
        <form action="includes/signup.inc.php" method="POST">
            <input type="text" name="usern" placeholder="Username">
            <input type="text" name="mail" placeholder="E-mail">
            <input type="password" name="pass" placeholder="Password">
            <input type="password" name="pass-repeat" placeholder="Repeat Password">
            <button type="submit" name="signup-submit">Register</button>
        </form>
    </div>
</main>
<?php
    include "footer.php";
?>