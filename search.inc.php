<?php
  require "includes/dbh.inc.php";
?>
<?php
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['Songname'])){
  $Songname=$_POST['Songname'];

  $sql="SELECT Song_Id, Song_Name, Song_Artist, Song_Genre FROM Songs WHERE Song_Name LIKE '%".$Songname."%'";

  $result=mysqli_query($conn,$sql);
  echo "<link rel='stylesheet'' href='style.css'>";
  echo "<title>{$Songname}</title>";
  require "header.php";
  echo "<br>
            <table class='songtable'>";
            echo "<tr><td class='th'>Song Name</td><td class='th'>Artist</td><td class='th'>Options</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['Song_Name'];
					$Song_Id =$row['Song_Id'];
					$Song_Name =$row['Song_Name'];
					$Song_Artist =$row['Song_Artist'];
					$Song_Genre =$row['Song_Genre'];
                    echo "<tr><td>{$row['Song_Name']}</td><td>{$row['Song_Artist']}</td><td class='songlink'><a href = 'songs.php?id=$Song_Id'>Link</a></td></tr>\n";
                }
            echo "</table>";
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>