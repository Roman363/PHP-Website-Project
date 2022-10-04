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
    </header>
</body>
</html>

<?php
    mkdir('anythingelse');
    
    if (isset($_POST['username']) && is_dir($_POST['username']) && isset($_POST['password'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

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