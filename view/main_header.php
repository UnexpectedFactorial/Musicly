<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Musicly</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/fontawesome.css" rel="stylesheet"> 
		<link href="css/all.css" rel="stylesheet"> 

	</head>
	<body>
		<div class="container-fluid" style="background-color: #f2f2f2;">
			<div style="background-color: #fff">
				<nav class="navbar navbar-expand-lg navbar-dark static-top">
					<div class="container-fluid">
						<a class="navbar-brand" href="#">Musicly</a>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
							<form action="login" method="post">
									<input type="text" name="username" placeholder="Username">
									<input type="password" name="password" placeholder="Password">
							</li>
							<li class="nav-item">
								<button type="submit" name="login" class="btn btn-outline-primary btn-sm mx-1">Log in</button>
							</li>
							</form>
							<li class="nav-item">
								<a href="signup">
									<button type="button" class="btn btn-primary btn-sm">Create account</button>
								</a>
							</li>
						</ul>
					</div>
				</nav>