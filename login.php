<?php include 'header.php';?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<div class="row justify-content-center my-4">
					<h1>Log In</h1>
				</div>
				<form action="includes/login.inc.php" method="POST" enctype="multipart/form-data" >
				<!--<input type="hidden" name="action" value="login_submit">-->
				<div class="form-group row justify-content-center">
				    <input type="email" name="email" class="form-control col-3" placeholder="Email">
                </div>
				<div class="form-group row justify-content-center">
				    <input type="password" name="password" class="col-3 form-control" placeholder="Password">
				</div>
				  
				<hr/>
				<div class="row justify-content-center">
				    <button type="submit" class="btn btn-primary">Log In</button>
				</div>
				  
				</form>
			</section>   
		</div>
	</main>



