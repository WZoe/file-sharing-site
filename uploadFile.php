<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Upload</title>
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
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, this file already exists, or you didn't select a file. ";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Your file was not uploaded. Directing you back...";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlentities(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded. Directing you back...";
        } else {
            echo "Sorry, there was an error uploading your file. Directing you back...";
        }
    }

    // redirect to main page after 3 seconds of delay
    header("refresh:3;url=index.php");
    exit();
    ?>
</div>
</body>
</html>