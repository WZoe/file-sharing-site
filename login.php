<?php
    session_start();
    include "login.html";

    // read username from input
    if (!isset($_GET["username"]) || $_GET["username"]=="") {
        echo "Login failed. Username can't be null!";
        return;
    }
    $username = $_GET["username"];

    // Open users.txt
    $filename = "/home/eimee/hidden_files/module2-group/users.txt";
    $fp = @fopen($filename, 'r'); 
    // Add each line to an array
    if ($fp) {
    $users = explode("\n", fread($fp, filesize($filename)));
    }
    fclose($fp);

    // if user is not in users.txt
    if (!in_array($username, $users)) {
        echo "Login failed. User not authorized!";
        return;
    }

    // user is authorized to login, create session for him/her
    $_SESSION["username"] = $username;
    header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/main.php");
    exit();
?>