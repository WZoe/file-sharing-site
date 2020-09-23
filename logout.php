<?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/login.html");
    exit();
?>