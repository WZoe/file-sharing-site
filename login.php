<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <title>Log in</title>
</head>
<body>
<div class="container">
    <h1>File Sharing Site</h1>
    <h2>Login</h2>
    <form method="GET">
        <p>
            username: <input type="text" name="username"/>
        </p>
        <p>
            <input class="button" type="submit" value="Login"/>
        </p>
    </form>
    <footer>
        Eimee Yang & Zoe Wang, 2020/09
    </footer>
    <?php
    session_start();

    // read username from input
    if (!isset($_GET["username"]) || $_GET["username"] == "") {
        echo "You need to login first. Username can't be null!";
        return;
    }
    $username = $_GET["username"];

    // Open users.txt
    $filename = "../../hidden_files/module2-group/users.txt";

    $fp = @fopen($filename, 'r');
    // Add each line to an array
    if ($fp) {
        $users = explode("\n", fread($fp, filesize($filename)));
    }
    fclose($fp);

    // if user is not in users.txt
    if (!in_array($username, $users)) {
        echo "Login failed. User not authorized!";
        exit();
    }

    // user is authorized to login, create session for him/her
    $_SESSION["username"] = $username;
    header("Location: index.php");
    exit();
    ?>
</div>
</body>
</html>