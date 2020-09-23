<!DOCTYPE html>
<html lang="en">
    <head>
        <title>File Sharing Site</title>
    </head>
<body>
    <h1>File Sharing Site</h1>   
    
    <strong>List User Files</strong>
<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/login.php");
        exit();
    }
    
    $user_dir = "/home/eimee/hidden_files/module2-group/".$_SESSION["username"]."/";
    if (!file_exists($user_dir)) {
        mkdir($user_dir, 0777, true);
    }
    $files = scandir($user_dir);
    foreach ($files as $file) {
        if (is_file($user_dir.$file)) {
            echo "<p>".htmlentities($file)." ";
            echo "<button onclick=\"window.location.href='openFile.php?file=".htmlentities($file)."'\">Open File</button>"." ";
            echo "<button onclick=\"window.location.href='deleteFile.php?file=".htmlentities($file)."'\">Delete File</button>";
            echo "</p>";
        }
    }
?>

    <p><strong>Upload File</strong></p>
    <form action="uploadFile.php" method="post" enctype="multipart/form-data">
        Select File to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

<form action="logout.php" method="GET">
        <p>
            <input type="submit" value="Logout"/>
        </p>
    </form>
</body>
</html>