<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Songs</title>
</head>
    
<body>
     <script>
        function openTab(evt, tabName) {
          var i, tabcontent, tablinks;

          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }

          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }

          document.getElementById(tabName).style.display = "block";
          evt.currentTarget.className += " active";
        } 
        var audio = document.getElementById("player");
            audio.volume = 0.2; 
        
        
    </script>
    
    <?php
    require "header.php";
    ?>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'All Songs')">All Songs</button>
        <button class="tablinks" onclick="openTab(event, 'Top 10')">Top 10</button>
        <button class="tablinks" onclick="openTab(event, 'Search')">Search</button>
    </div>
    
    <div id="All Songs" class="tabcontent">
        <?php
            $sql = "SELECT * FROM songs;";
            $result = mysqli_query($conn,$sql);
        
            echo "<table class='songtable'>";
            echo "<tr><td class='th'>Song Name</td><td class='th'>Artist</td><td class='th'>Options</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['File_Name'];
                    $songid = $row['Song_Id'];
                    echo "<tr><td>{$row['Song_Name']}</td><td>{$row['Song_Artist']}</td><td class='songlink'><a href = 'songs.php?id=$songid'>Link</a></td></tr>\n";
                }
            echo "</table>";
        ?>
    </div>

    <div id="Top 10" class="tabcontent">
        <?php
            $sql = "SELECT * FROM songs ORDER BY Avg_Rating DESC LIMIT 10;";
            $result = mysqli_query($conn,$sql);
            $counter = 1;
            echo "<table class='songtable'>";
            echo "<tr><td class='th'>Place</td><td class='th'>Song Name</td><td class='th'>Artist</td><td class='th'>Options</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['File_Name'];
                    $songid = $row['Song_Id'];
                    echo "<tr><td>$counter</td><td>{$row['Song_Name']}</td><td>{$row['Song_Artist']}</td><td class='songlink'><a href = 'songs.php?id=$songid'>Link</a></td></tr>\n";
                    $counter++;
                }
            echo "</table>";
        ?>
    </div>

    <div id="Search" class="tabcontent">
            <p>Search by Song Name</p>
            <form  method="post" action="search.inc.php?go"  id="searchform">
              <input  type="text" name="Songname" placeholder="Search Songs" required>
              <input  type="submit" name="submit" value="Search" id="search">
            </form>

    </div>
    
</body>    
</body>    
</html>