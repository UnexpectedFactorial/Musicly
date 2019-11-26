<?php include 'header.php';?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<div class="row justify-content-center my-4">
					<h1>Create an Account</h1>
				</div>
				<form action="." method="post">
					<input type="hidden" name="action" value="signup_submit">
				  <div class="form-group row justify-content-center">
				  	<input type="email" name="email" class="form-control col-3" placeholder="Email">
				  </div>
				  <div class="form-group row justify-content-center">
				    <input type="text" name="username" class="col-3 form-control" placeholder="Username">
				  </div>
				  <div class="form-group row justify-content-center">
				    <input type="password" name="password" class="col-3 form-control" placeholder="Password">
				  </div>
				  <div class="form-group row justify-content-center">
				    <input type="password" name="password_repeat" class="col-3 form-control" placeholder="Re-Enter Password">
				  </div>
				  <hr/>
				  <div class="row justify-content-center">
				  	<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				  
				</form>
			</section>   
		</div>
	</main>



