<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">	
</head>
<body>
<div style="position: absolute; left: 40%; top: 30%;">
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title text-center">Login</h5>
	    
	    <form method="POST" action="login_pr.php">
		  	<div class="form-group">
		    	<label for="email">Username</label>
		    	<input type="text" class="form-control" name="un" id="un" placeholder="Enter username">
			</div>

		  	<div class="form-group">
		    	<label for="password">Password</label>
		    	<input type="password" class="form-control" name="pw" id="pw" placeholder="Enter password">
		  	</div>

		  	<div class="row">
			  	<div class="col-sm-6">
			  		<button type="submit" name="sub" id="sub" class="btn btn-primary">Submit</button>
			  	</div>
			  	<div class="col-sm-6">
			  			<input type="button" value="Register" class="btn btn-success" onclick="window.location.href='register.php'" />
		
			  	</div>
		  	</div>
		  	
		  <?php 
	      		if(!isset($_SESSION)) { 
			        session_start(); 
			      } 
	      		if (!empty($_SESSION['error'])){
		          echo '<div class="alert alert-danger text-center p-1" role="alert">';
		          echo $_SESSION['error'];
		          echo '</div>';
		          unset($_SESSION['error']);
	      		}
	        ?> 
		</form>

  </div>
</div>
</div>
</body>
</html>