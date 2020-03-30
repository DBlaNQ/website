<?php
    include 'header.php';
?>
<main>
    <div id="chatform">
    <?php
        if(isset($_SESSION['username'])){
            echo '
                <div id="output">
                
                </div>
                <form name="msgform" method="post">
                    <input type="text" name="msg" autofocus placeholder="Type a message to send">
                    <button type="submit" name="submit" onclick="submitChat">Send</button>
                </form>
                ';
        }else{
            echo "<p>You are logged out</p>";
        }
    ?>
    </div>
</main>
<?php
    include 'footer.php'
?>