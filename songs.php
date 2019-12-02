<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
        <div>
            <h2>{$row['Song_Name']}</h2>
            <h3>by {$row['Song_Artist']}</h3>
            <audio controls id='player' src='uploads/song/$file_name'></audio>
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
        </div>
        <div style="width:50%;">
            <h2 align="center"><a href="#">Comments</a></h2>
              <br>
              <div class="container">
               <form method="POST" 
                     id="comment_form">
                <div class="form-group">
                        <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name (Default is anon)" />
                </div>
                <div class="form-group">
                        <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Add a public comment..." rows="5"></textarea>
                </div>
                <div class="form-group">
                        <input type="hidden" name="comment_id" id="comment_id" value="0" />
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
               </form>
               <span id="comment_message"></span>
               <br>
               <div id="display_comment"></div>
              </div>
                </div>
                <br>
        </div>
</body>    
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"addcomment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"loadcomment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>