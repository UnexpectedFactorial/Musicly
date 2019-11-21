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
  // To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
  require "header.php";
    ?>
    <div id="uploader"> <!--Song Uploader-->
        <h2>Upload a File</h2>
        <p>Please only upload only mp3 files under 5MB</p>
        <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
            
            <label for="songName">Song Name</label>
            <input type="text" name="songName" placeholder="Insert Song Name" Required/>
            
            <label for="artistName">Artist</label>
            <input type="text" name="artistName" placeholder="Insert Artist Name" Required/>
            
            <label for="genre">Genre</label>
            <input type="text" name="genre" placeholder="Insert Genre" Required/>
              
            <br>
            <br>
            <input type="file" name="file" accept="audio/*">
             <br>
            <br>
            <button type="submit" name="submit" id="submit">Upload File</button>
        </form>
    </div>
</body>    
</html>