<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Log out</title>
</head>
<body>
<div class="container">
    <h1>File Sharing Site</h1>
    <footer>
        Eimee Yang & Zoe Wang, 2020/09
    </footer>
    <?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    echo "You are successfully logged out. Directing you back...";
    header("refresh:3;url=login.php");
    exit();
    ?>

</div>

</body>
</html>