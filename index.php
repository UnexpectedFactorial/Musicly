<?php
 
  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">
         
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }
          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged in!</p>';
          }
          ?>
        </section>
      </div>
        
        <audio src="uploads/song/.mp3" id="player"> </audio>
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
    </main>

<?php
 .
  require "footer.php";
?>
