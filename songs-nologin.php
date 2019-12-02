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
    $sql = "SELECT * FROM songs WHERE Song_Id = $song_id;";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $file_name = $row['File_Name'];
    $_SESSION['song_id'] = $song_id;
    
    echo "
        <div id='songplayer'>
            <h2>{$row['Song_Name']}</h2>
            <h3>by {$row['Song_Artist']}</h3>
            <audio controls id='player' src='uploads/song/$file_name' style='bottom:0;'></audio>
            <script>
                var audio = document.getElementById('player');
                audio.volume = 0.5; 
            </script>
        </div>
        "
        ?>
    <div id="song-wrapper">
        <div id="ratings">
            <form action="includes/rating.inc.php" METHOD="POST" enctype="multipart/form-data"> <!--calls upon the rating.php script to insert the rating into the mySQL table-->
                <label>Please leave a rating</label><br>
                <input type="radio" name="rating" value = 1> 1 - Appalling <br>
                <input type="radio" name="rating" value = 2> 2 - Horrible <br>
                <input type="radio" name="rating" value = 3> 3 - Very Bad <br>
                <input type="radio" name="rating" value = 4> 4 - Bad <br>
                <input type="radio" name="rating" value = 5> 5 - Average <br>
                <input type="radio" name="rating" value = 6> 6 - Fine <br>
                <input type="radio" name="rating" value = 7> 7 - Good <br>
                <input type="radio" name="rating" value = 8> 8 - Very Good <br>
                <input type="radio" name="rating" value = 9> 9 - Great <br>
                <input type="radio" name="rating" value = 10>10 - Masterpiece <br>
                <button type="submit" name="submit">Submit Your Rating</button>
            </form>

            <p>The current rating is:</p>
            <?php
                $song_id = $_GET['id'];
                $sql = "SELECT ROUND(AVG(rating),2) AS avgrating FROM songrating WHERE song_id = $song_id;"; //selects the average of the rating column of a specific song
                $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_assoc($result)){
                        if ($row['avgrating'] == 0){
                            echo "No Ratings Yet!"; //shows up if there hasnt been any ratings for the current song
                        }
                        else{
                            echo $row['avgrating'];
                        }
                    }
            ?>
            <p style="color:red;">You were not logged in!</p>
        </div>
        
        <div id="comments">
            <form action="includes/comment.inc.php" METHOD="POST" enctype="multipart/form-data" id="comment-submit">
                <label>Please remember to be civil!</label><br>
                <input type="text" name="comment"><br>
                <button type="submit" name="submit">Submit Your Comment</button>
            </form>
            
            <?php
            $sql = "SELECT * FROM commentdb WHERE song_id = $song_id;";
            $result = mysqli_query($conn,$sql);
        
            echo "<table class='commenttable'>";
            echo "<tr><td class='cth'>User</td><td class='cth' style='width:100%;'>Comment</td><td class='cth'>Options</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $songid = $row['Song_Id'];
                    echo "<tr><td>{$row['Username']}</td><td>{$row['comment_text']}</td><td>Delete</td></tr>\n";
                }
            echo "</table>";
            ?>
        </div>
    </div>
</body>    
</html>