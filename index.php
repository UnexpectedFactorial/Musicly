<?php include 'view/header.php';?>

	<div id="slides" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
		</ul>
		<div class="carousel-inner">
			<div class="item active">
				<img src="images/concert.jpg">
				<div class="carousel-caption">
					<h1 class="display-1">Music for everyone</h1>
					<h3>Thousands of songs. No credit card needed.
					</h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="nextmusic.jpg">
				<div class="carousel-caption">
					<h1 class="display-1">Music for everyone</h1>
					<h3>Thousands of songs. No credit card needed.
					</h3>
				</div>
			</div>
		</div>
	</div>
	<form class="form-inline active-purple-4 d-flex justify-content-center mt-4">
  		<input class="form-control form-control-lg mr-3 w-75" type="text" placeholder="Search for artists and tracks"
    aria-label="Search">
  		<i class="fas fa-search" aria-hidden="true"></i>
	</form>