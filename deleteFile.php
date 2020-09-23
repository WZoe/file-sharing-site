<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/login.php");
        exit();
    }

    $target_dir = "/home/eimee/hidden_files/module2-group/".$_SESSION["username"]."/";
    $file = $_GET["file"];
    unlink($target_dir.$file);

    // redirect to main page
    header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/main.php");
    exit();
?>