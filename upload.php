<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Upload A Song</title>
</head>
    
<body>
    <?php
    require "header.php";
    if (isset($_SESSION['id'])) {
          echo '<div id="uploader"> <!--Song Uploader-->
                <h2>Upload a File</h2>
                <p>Please only upload only mp3 files under 5MB</p>
                <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">

                    <label for="songName">Song Name</label>
                    <input type="text" name="songName" placeholder="Insert Song Name" Required/>
                    <br>
                    <label for="artistName">Artist</label>
                    <input type="text" name="artistName" placeholder="Insert Artist Name" Required/>
                    <br>
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" placeholder="Insert Genre" Required/>

                    <br>
                    <br>
                    <input type="file" name="file" accept="audio/*">
                     <br>
                    <br>
                    <button type="submit" name="submit" id="submit">Upload File</button>
                </form>
            </div>';
        
          }
            else if (!isset($_SESSION['id'])) {
            echo '<h1>Please Log In to Upload Songs!</h1>';
        }
    ?>
</body>    
</html>