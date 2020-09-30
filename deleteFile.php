<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Delete</title>
</head>
<body>
<div class="container">
    <h1>File Sharing Site</h1>
    <footer>
        Eimee Yang & Zoe Wang, 2020/09
    </footer>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $target_dir = "../../hidden_files/module2-group/" . $_SESSION["username"] . "/";
    $file = $_GET["file"];
    unlink($target_dir . $file);

    // redirect to main page
    echo htmlentities($file) . " is successfully deleted! Directing you back...";
    header("refresh:3;url=index.php");
    exit();
    ?>
</div>
</body>
</html>