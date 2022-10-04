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
<html>
    <header>
        <body>

        <?php
        $username = $_SESSION['username'];
        echo "<h1>Welcome $username! <br>
        Please Select What Service You'd Like To Use!</h1>";
        ?>
        <input type="button" onclick="window.location = 'http://localhost:3000/zotify.php'" value="Go to Zotify"/>
            
        <input type="button" onclick="window.location = 'http://localhost:3000/ztunes.php'" value="Go to zTunes"/>
        
        <form method="post" >
            <b> Create Playlist ---> </b>
            <input type="text" name= "playlistname">
            <input type="submit">
        </form> 

        <form method="post" >
            <b> Open Playlist ---> </b>
            <input type="text" name= "openplaylist">
            <input type="submit">
        </form>
    
            <?php 
                $username = $_SESSION['username'];

                if (isset($_POST['playlistname'])) {
                    $playlist = $_POST['playlistname'];
                    $somefile = fopen("$username/$playlist.txt", "w");
                    header("refresh: 0");
                }

                if (isset($_POST['openplaylist'])) {
                    $playlist = $_POST['openplaylist'];
                    $playlistcontents = "$username/$playlist.txt";
                    $playlistcontents1 = explode("\n", file_get_contents($playlistcontents));

                    for ($i=0; $i < sizeof($playlistcontents1); $i++) {
                        echo "$playlistcontents1[$i]<br>";
                    }

                    $_SESSION = ['currentplaylist'];
                }

            ?>
        </body>
    </header>
</html>