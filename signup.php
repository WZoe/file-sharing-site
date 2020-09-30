<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Sign Up</title>
</head>
<body>
<div class="container">
    <h1>File Sharing Site</h1>
    <h2>Sign Up</h2>
    <form method="GET">
        <p>
            Username: <input type="text" name="username"/>
        </p>
        <p>
            <input class="button" type="submit" value="Sign up"/>
        </p>
    </form>
    <footer>
        Eimee Yang & Zoe Wang, 2020/09
    </footer>
    <?php
    session_start();

    // read username from input
    if (!isset($_GET["username"]) || $_GET["username"] == "") {
        echo "Username can't be null!";
        return;
    }
    $username = $_GET["username"];

    // Open users.txt
    $filename = "../../hidden_files/module2-group/users.txt";

    $fp = @fopen($filename, 'a');
    // Add a new line for the new user
    if ($fp) {
        fwrite($fp, PHP_EOL . $username);
    }
    fclose($fp);

    // user is created and authorized to login, create session for him/her
    $_SESSION["username"] = $username;
    echo "Your have successfully signed up! We're now logging you in...";
    header("refresh:3;url=index.php");
    exit();
    ?>
</div>
</body>
</html>