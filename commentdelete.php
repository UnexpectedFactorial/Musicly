<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <?php
        $song_id = $_GET['id'];
        $sql = "SELECT * FROM songs WHERE Song_Id = $song_id;";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        echo "<title>{$row['Song_Name']}</title>"
    ?>
</head>
    
<body>
    <?php
    require "header.php";
    $song_id = $_GET['id'];
    $user_id = $_GET['uid'];
    $comment_id = $_GET['cid'];
    $sql = "SELECT * FROM commentdb WHERE Comment_Id = $comment_id;";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
   
    if($row['User_Id'] == $user_id OR isset($_SESSION['admin'])){
        $sql = "DELETE FROM commentdb WHERE Comment_Id='$comment_id'";
        $result = mysqli_query($conn,$sql);
        header('Location: songs.php?id=' . $song_id);
    }
    else{
        echo "<h1>ACCESS DENIED: YOU ARE NOT THE COMMENTER!</h1>";
    }
    ?>
   
</body>    
</html>