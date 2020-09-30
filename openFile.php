<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Open File</title>
</head>
<body>
<div class="container">
    <h1>
        <?php
        echo htmlentities($_GET["file"]);
        ?>
    </h1>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }

    $target_dir = "../../hidden_files/module2-group/" . $_SESSION["username"] . "/";
    $file = $_GET["file"];
    $filepath = $target_dir . $file;
    $content = file_get_contents($target_dir . $file);

    $content_type = mime_content_type($filepath);
    // for file types that can be directly viewed through browser, view content in browser
    if ($content_type == "text/plain") {
        echo htmlentities($content);
    } else {
        // for file types that cannot be directly viewed through browser, download them
        // Use file_get_contents() function to get the file
        // from url and use file_put_contents() function to
        // save the file by using file base name
        if (file_put_contents("downloads/" . $file, $content)) {
            echo "Downloading " . htmlentities($file);
            header("refresh:3;url=downloads/" . htmlentities($file));
        } else {
            echo "File downloading failed. Directing you back...";
        }
    }
    ?>
    <br/>
    <button onclick="window.location.href='index.php'">Back</button>
    <footer>
        Eimee Yang & Zoe Wang, 2020/09
    </footer>
</div>
</body>
</html>