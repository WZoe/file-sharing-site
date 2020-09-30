<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>File Sharing Site</title>
</head>
<body>
<div class="container">
    <h1>File Sharing Site</h1>

    <b>List User Files</b>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $user_dir = "../../hidden_files/module2-group/" . $_SESSION["username"] . "/";
    if (!file_exists($user_dir)) {
        mkdir($user_dir, 0777, true);
    }
    $files = scandir($user_dir);
    foreach ($files as $file) {
        if (is_file($user_dir . $file)) {
            echo "<p>" . htmlentities($file) . " ";
            echo "<button onclick=\"window.location.href='openFile.php?file=" . htmlentities($file) . "'\">Open File</button>" . " ";
            echo "<button onclick=\"window.location.href='deleteFile.php?file=" . htmlentities($file) . "'\">Delete File</button>";
            echo "</p>";
        }
    }
    ?>

    <b>Upload File</b>
    <form action="uploadFile.php" method="post" enctype="multipart/form-data">
        Select File to upload:
        <input class="button" type="file" name="fileToUpload" id="fileToUpload">
        <input class="button" type="submit" value="Upload File" name="submit">
    </form>

    <form action="logout.php" method="GET">
        <p>
            <input class="button" type="submit" value="Logout"/>
        </p>
    </form>
    <footer>
        Eimee Yang & Zoe Wang, 2020/09
    </footer>
</div>
</body>
</html>