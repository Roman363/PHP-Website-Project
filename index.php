<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <b>Welcome to Sussy Music!!</b>
    <form method="post">
        <p>Username:<br/></p>
        <input type="text" name="username"><br/>
        <p>Password:<br/></p>
        <input type="password" name="password"><br/>
        <input type="submit" value="Login!">
    </form>
    <form method="post">
        <p>Username:<br/></p>
        <input type="text" name="new_username"><br/>
        <p>Password:<br/></p>
        <input type="password" name="new_password"><br/>
        <input type="submit" value="Create a Account!">
    </form>
    </header>
</body>
</html>

<?php
    if (isset($_POST['new_username']) && isset($_POST['new_password'])) {
        if (is_dir($_POST['new_username'])) {
            echo "User already exists";
        }
        else {
            mkdir($_POST['new_username']);
            $new_username = $_POST['new_username'];
            $password= $_POST['new_password'];
            $somefolder = fopen("$new_username/password.txt", "w");
            fwrite($somefolder, $password);
            fclose($somefolder);
            header("refresh: 0");
        }
    }
       
?>

<?php

    if (isset($_REQUEST['username']) && is_dir($_REQUEST['username']) && isset($_REQUEST['password'])) {
        
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $fileinfo = fopen("$username/password.txt", "r");
        $p = fgets($fileinfo);
        fclose($fileinfo);

        if ($p == $password) {
           $_SESSION['username'] = $username;
           header("Location: welcome.php");
           die();
        }
    }


?>


