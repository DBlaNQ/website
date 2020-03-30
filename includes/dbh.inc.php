<?php

$servername = 'localhost';
$serveruser = 'root';
$serverpass = '';
$db = 'forum';

$con = mysqli_connect($servername, $serveruser, $serverpass, $db);
    if(!$con){
        die("Connection Failed: ".mysqli_connect_error());
    }