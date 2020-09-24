<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
    </head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["username"])) {
            header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/login.php");
            exit();
        }
        
        $target_dir = "/home/eimee/hidden_files/module2-group/".$_SESSION["username"]."/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlentities(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
        
        // redirect to main page
        header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/main.php");
        exit();
    ?>
</body>
</html>