<?php
    include "header.php";
?>
    <main>
        <div id="wrapper">
        <?php
            if(isset($_SESSION['username'])){
                echo '<p>You are logged in</p>
                <p>Welcome back '.$_SESSION['username'].'</p>';
            }else{
                echo "<p>You are logged out</p>";
            }
        ?>
        </div>
    </main>
<?php
    include "footer.php";
?>