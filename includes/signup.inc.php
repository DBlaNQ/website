<?php
    if(isset($_POST['signup-submit'])){
        require 'dbh.inc.php';
        $username = $_POST['usern'];
        $email = $_POST['mail'];
        $password = $_POST['pass'];
        $passwordrpt = $_POST['pass-repeat'];

        if(empty($username) || empty($email) || empty($password) || empty($passwordrpt)){
            header("Location: ../signup.php?error=emptyfields&usern=".$username."&mail=".$email);
            exit();
        }
        else if($password !== $passwordrpt){
            header("Location: ../signup.php?error=passcheck&usern=".$username."&mail=".$email);
        }
        else{
            $sql = "SELECT * From forumdb Where username=?";
            $stmt = mysqli_stmt_init($con);


            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultC = mysqli_stmt_num_rows($stmt);
                if($resultC > 0){
                    header("Location: ../signup.php?error=userTaken");
                }else{
                    $sql = "INSERT Into forumdb (username, email, passU) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        $hashpass = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpass);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../signup.php");
        exit();
    }