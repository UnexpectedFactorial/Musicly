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
    ?>
    
    <audio src="uploads/song/5ddcd801d0cd51.61630595.mp3" id="player"> </audio>
        <script>
            var audio = document.getElementById("player");
            audio.volume = 0.2; //pushes the default volume to 20%
        </script>
        <div id="music-player"> 
          <button onclick="document.getElementById('player').play()">Play</button> 
          <button onclick="document.getElementById('player').pause()">Pause</button> 
          <button onclick="document.getElementById('player').volume += 0.1">Vol +</button> 
          <button onclick="document.getElementById('player').volume -= 0.1">Vol -</button> 
          <button onclick="document.getElementById('player').load()">Replay</button>
        </div>
</body>    
</html>