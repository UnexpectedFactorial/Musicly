<?php
  // To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
  require "header.php";
?>
<head>
    <title>Home Page</title>
</head>
    <main>
        <div>
            <div>
                <div>
                    <img src="img/concert.jpg" style="width:100%;object-fit:cover;height:500px">
                        <div>
                            <h1>Music for everyone</h1>
                            <center><h3>Thousands of songs. No credit card needed.</h3></center>
				        </div>
                </div>
            </div>
        </div>
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
        
        
    </main>


