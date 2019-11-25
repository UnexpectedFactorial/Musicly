<!DOCTYPE html>
<?php
      require "dbh.inc.php";
?>
<html>
<head>
    <link rel="stylesheet" href="theme.css">
    <title>Rating</title>
</head>
    
<body>
    <div id="ratings">
        <form action="rating.php" METHOD="POST" enctype="multipart/form-data"> <!--calls upon the rating.php script to insert the rating into the mySQL table-->
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
            $currentsong = 2;//please replace this value with a session of the song_id
            $sql = "SELECT ROUND(AVG(rating),2) AS avgrating FROM ratingsystem WHERE song_id = $currentsong;"; //selects the average of the rating column of a specific song
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($result)){
                //echo $row['avgrating'];
                if ($row['avgrating'] == 0){
                    echo "No Ratings Yet!"; //shows up if there hasnt been any ratings for the current song
                }
                else{
                    echo $row['avgrating'];
                }
            }
        ?>
    </div>
</body>    
</html>