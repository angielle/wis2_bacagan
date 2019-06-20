<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">	
</head>
<body>
<div style="position: absolute; left: 28%; top: 10%;">
	<div class="card" style="width: 50rem;">
	  <div class="card-body">
	    <h5 class="card-title text-center">Register</h5>
	    
	    <form method="POST" action="register_pr.php">
		  	<div class="form-group">
		    	<label for="text">Username</label>
		    	<input type="text" class="form-control" name="un" id="un" placeholder="Enter username">
			</div>

			<div class="form-group">
		    	<label for="email">Email</label>
	    		<input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
		  	</div>


		  	<div class="form-group">
		    	<label for="password">Password</label>
		    	<input type="password" class="form-control" name="pw1" id="pw1" placeholder="Enter password">
		  	</div>

		  	<div class="form-group">
		    	<label for="password">Confirm Password</label>
		    	<input type="password" class="form-control" name="pw2" id="pw2" placeholder="Enter password again">
		  	</div>

		  	<div class="form-group">
		    	<label for="text">First Name</label>
		    	<input type="text" class="form-control" name="fn" id="fn" placeholder="Enter first name">
			</div>

			<div class="form-group">
		    	<label for="text">Middle Name</label>
		    	<input type="text" class="form-control" name="mn" id="mn" placeholder="Enter middle name">
			</div>

			<div class="form-group">
		    	<label for="text">Last Name</label>
		    	<input type="text" class="form-control" name="ln" id="ln" placeholder="Enter last name">
			</div>

		  	<div class="d-flex justify-content-center">
		  		<button type="submit" name="sub" id="sub" class="btn btn-primary">Register</button>
		  	</div>
		  	<br>
		  	<div class="d-flex justify-content-center">
		  	<?php 
	      		if(!isset($_SESSION)) { 
			        session_start(); 
			      } 
	      		if (!empty($_SESSION['error'])){
		          echo '<div class="alert alert-danger text-center d-inline-flex p-2 justify-content-center" role="alert">';
		          echo $_SESSION['error'];
		          echo '</div>';
		          unset($_SESSION['error']);
	      		}
	        ?> 
	    	</div>
		</form>

  </div>
</div>
</div>
</body>
</html>