<?php
    if(isset($_POST['login-submit'])){
        require 'dbh.inc.php';
        $mailuser = $_POST['mailuid'];
        $pass = $_POST['pass'];

        if(empty($mailuser) || empty($pass)){
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        else{
            $sql = "SELECT * From forumdb Where username=? Or email=?;";
            $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "ss", $mailuser, $mailuser);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $passChk = password_verify($pass, $row['passU']);
                    if($passChk == false){
                        header("Location: ../index.php?error=wrngPass");
                        exit();
                    }
                    else if($passChk == true){
                        session_start();
                        $_SESSION['userId'] = $row['idUsers'];
                        $_SESSION['username'] = $row['username'];

                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else{
                        header("Location: ../index.php?error=wrngPass");
                        exit();
                    }
                }
                else{
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else{
        header("Location: ../index.php");
        exit();
    }