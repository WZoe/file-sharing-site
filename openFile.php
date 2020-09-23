<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/login.php");
        exit();
    }

    $target_dir = "/home/eimee/hidden_files/module2-group/".$_SESSION["username"]."/";
    $file = $_GET["file"];
    $filepath = $target_dir.$file;
    $content = file_get_contents($target_dir.$file);

    $content_type = mime_content_type($filepath);
    // for file types that can be directly viewed through browser, view content in browser
    if ($content_type == "text/plain") {
        echo htmlentities($content);
    }
    else {
    // for file types that cannot be directly viewed through browser, download them
        // Use file_get_contents() function to get the file 
        // from url and use file_put_contents() function to 
        // save the file by using file base name 
        if(file_put_contents($file, $content)) { 
            echo "File downloaded successfully"; 
            header("Location: http://ec2-18-206-208-42.compute-1.amazonaws.com/~eimee/module2-group/".htmlentities($file));
            exit();
        } 
        else { 
            echo "File downloading failed."; 
        }
    }
?>
<p><button onclick="window.location.href='main.php'">Return</button></p>