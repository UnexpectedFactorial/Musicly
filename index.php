<!DOCTYPE html>
<?php include 'header.php';
session_start();
$_SESSION['status'] = 0;
?>
<html lang="en">
	<head>
		<title>Musicly</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/fontawesome.css" rel="stylesheet"> 
		<link href="css/all.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"> 

	</head>
	<body>
        

				<div id="slides" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="images/concert.jpg" style="width:100%;">
							<div class="carousel-caption">
								<h1 class="display-1">Music for everyone</h1>
								<h3>Thousands of songs. No credit card needed.
								</h3>
							</div>
						</div>
					</div>
				</div>
				<!--<form class="mx-2 my-auto d-inline">
		            <div class="input-group">
		                <input type="text" class="form-control form-control-lg" placeholder="Search for artists, tracks">
		                <span class="input-group-append">
		                <button class="btn btn-outline-secondary border" type="button">
		                    <i class="fa fa-search"></i>
		                </button>
		              </span>
		            </div>
		        </form>
                -->
				<h4 class="text-center trend mt-5">Hear what's trending in the Musicly community</h4>

				<!--<div class="container">
					<div class="row text-center mt-5">
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="track">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="track">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
					</div>
					<div class="row text-center mt-4">
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1 mb-4">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   			<div class="col pr-1">
			      			<img src="images/imageholder.png">
			      			<div>
			      				<a href="#">Music Title</a>
			      			</div>
			      			<div>
			      				<a href="#">Music Artist</a>
			      			</div>
			   			</div>
			   		</div>
				</div>
                -->
        <audio src="uploads/song/06-fushigi.mp3" id="player"> </audio>
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
                    
        <?php 
                  if ($_SESSION['status'] == 0){  
                    echo '
                        <div class="container-fluid py-4" style="height: 300px; background-color: #f2f2f2;">
                        <div class="text-center my-3">
                            <h1 class="display-5">Thanks for listening. Now join in.</h1>
                        </div>
                        <div class="text-center mb-4">
                            <h5>Create an account and start uploading your favorite tracks.</h5>
                        </div>
                        <div class="text-center mb-3">
                            <a href="signup.php">
                              <button type="button" class="btn btn-primary btn-lg">Create account</button>
                            </a>
                        </div>
                        <div class="text-center mb-5">
                            Already have an account?
                           <a href="login.php">
                                <button type="button" class="btn btn-primary btn-sm text-center ml-2 d-inline" style="background-color: #fff; color: #000;"> Sign in </button>
                            </a>
                        </div>
                    </div>';
                  }
        else{
            echo '
                <center><h1>You Are Logged In</h1></center>
                ';
                
        }
    ?>

				<footer style="background-color: black; color: white; height: 40px;">
		  			<div class="footer-copyright text-center py-1">
		  				© 2019 Copyright: Musicly
		  			</div>
				</footer>
			</div>
		</div>
	</body>
</html>


	

