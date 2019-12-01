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
    <center><h3>Please Select an Option.</h3></center>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'All Songs')">All Songs</button>
        <button class="tablinks" onclick="openTab(event, 'Top 10')">Top 10</button>
        <button class="tablinks" onclick="openTab(event, 'Search')">Search</button>
    </div>
    
    <div id="All Songs" class="tabcontent">
        <?php
            $sql = "SELECT * FROM songs;";
            $result = mysqli_query($conn,$sql);
        
            echo "<table border='1'>";
            echo "<tr><td>Song Name</td><td>Artist</td><td>Options</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['File_Name'];
                    $songid = $row['Song_Id'];
                    echo "<tr><td>{$row['Song_Name']}</td><td>{$row['Song_Artist']}</td><td><a href = 'songs.php?id=$songid'>Link</a></td></tr>\n";
                }
            echo "</table>";
        ?>
    </div>

    <div id="Top 10" class="tabcontent">
        <?php
            $sql = "SELECT * FROM songs ORDER BY Avg_Rating DESC LIMIT 10;";
            $result = mysqli_query($conn,$sql);
            $counter = 1;
            echo "<table border='1'>";
            echo "<tr><td>Place</td><td>Song Name</td><td>Artist</td><td>Options</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['File_Name'];
                    $songid = $row['Song_Id'];
                    echo "<tr><td>$counter</td><td>{$row['Song_Name']}</td><td>{$row['Song_Artist']}</td><td><a href = 'songs.php?id=$songid'>Link</a></td></tr>\n";
                    $counter++;
                }
            echo "</table>";
        ?>
    </div>

    <div id="Search" class="tabcontent">
        <h1>SEARCH HERE</h1>
    </div>
    
    
<audio id="player"> </audio>
    <source id='audioSource' src=""></source>

        <div id="music-player"> 
          <button onclick="document.getElementById('player').play()">Play</button> 
          <button onclick="document.getElementById('player').pause()">Pause</button> 
          <button onclick="document.getElementById('player').volume += 0.1">Vol +</button> 
          <button onclick="document.getElementById('player').volume -= 0.1">Vol -</button> 
          <button onclick="document.getElementById('player').load()">Replay</button>
        </div>
</body>    
</body>    
</html>