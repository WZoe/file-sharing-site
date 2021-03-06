<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>File Sharing Site</title>
</head>
<body>
<div class="container">
    <h1>File Sharing Site</h1>

    <h2>List User Files</h2>
    <form class="center" method="GET">
        <input class="button type <?php if (!isset($_GET["type"]) or $_GET["type"] == "All") echo "checked" ?>"
               type="submit" name="type" value="All">
        <input class="button type <?php if ($_GET["type"] == "Doc") echo "checked" ?>" type="submit" name="type"
               value="Doc">
        <input class="button type <?php if ($_GET["type"] == "PDF") echo "checked" ?>" type="submit" name="type"
               value="PDF">
        <input class="button type <?php if ($_GET["type"] == "Image") echo "checked" ?>" type="submit" name="type"
               value="Image">
        <input class="button type <?php if ($_GET["type"] == "Zip") echo "checked" ?>" type="submit" name="type"
               value="Zip">
    </form>
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
    if (isset($_GET["type"])) {
        $type = $_GET["type"];
    }

    # Mapping of the types
    $types["Doc"] = array('text/plain', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint');
    $types["PDF"] = array('application/pdf');
    $types["Image"] = array('image/png', 'image/jpeg', 'image/gif');
    $types["Zip"] = array('application/zip');

    foreach ($files as $file) {
        if (is_file($user_dir . $file)) {
            # if the file type matches what we wanted
            if (!isset($_GET["type"]) or $type == "All" or in_array(mime_content_type($user_dir . $file), $types[$type])) {
                echo "<p>" . htmlentities($file) . " ";
                echo "<button onclick=\"window.location.href='openFile.php?file=" . htmlentities($file) . "'\">Open File</button>" . " ";
                echo "<button onclick=\"window.location.href='deleteFile.php?file=" . htmlentities($file) . "'\">Delete File</button>";
                echo "</p>";
            }
        }
    }
    ?>

    <h2>Upload File</h2>
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