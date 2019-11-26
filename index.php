<?php
  // To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <!--
          We can choose whether or not to show ANY content on our pages depending on if we are logged in or not. I talk more about SESSION variables in the login.inc.php file!
          -->
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
  // And just like we include the header from a separate file, we do the same with the footer.
  require "footer.php";
?>
