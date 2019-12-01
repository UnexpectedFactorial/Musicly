<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Listen</title>
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
        <audio controls id='player' src='uploads/song/$file_name'></audio>
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
        </div>
    </div>
</body>    
</html>