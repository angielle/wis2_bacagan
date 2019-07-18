<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Company Statistics</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=DM+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="js/jquery.js"></script>
    </head>


    <body>
    	<nav id="navbar">
			<span style="color: #ffffff;">COMPANY STATISTICS</span>
    		<a class="nav active">Employee Count</a>
			<a class="nav">Employee Salaries</a>    	
    	</nav>

		<section class="container">
			<div class="card-container">
	    		<div class="card">

		    		<h5>Department</h5>
		    		<select id="dept">
		    			<option value="all">All</option>
					    <?php
						 	$conn = new mysqli("localhost", 'root', '', 'company');
							$dept_sql = "SELECT * FROM departments;";
							$dept_res = mysqli_query($conn, $dept_sql);

							while ($row = mysqli_fetch_assoc($dept_res)) {
								$dept_no = $row['dept_no'];
								$dept_name = $row['dept_name'];

								echo "<option value='".$dept_no."'>".$dept_name."</option>";
							}
						  ?>
					</select>

					<h5>Title</h5>
		    		<select id="title">
		    			<option value="all">All</option>

					    <?php
							$title_sql = "SELECT DISTINCT title FROM titles;";
							$title_res = mysqli_query($conn, $title_sql);

							while ($row = mysqli_fetch_assoc($title_res)) {
								$title = $row['title'];
								echo "<option value='".$title."'>".$title."</option>";
							}
					  	?>
					</select>

					<h5>Date Range</h5>
					<p>From</p>
					<input type="date" name="date_from" value="1985-01-01" min="1985-01-01" max="2002-08-01">
					<p>To</p>
					<input type="date" name="date_to" value="1985-02-17" min="1985-02-17" max="9999-01-01">

					<input type="checkbox" name="current"> Current

					<div class="button-container">
						<button type="button" class="submit_btn">SUBMIT</button>
					</div>

	    		</div>
    		</div>	
		</section>
    	<script type="text/javascript">
    		// Navigation
    		var navbar = document.getElementById("navbar");
    		var links = navbar.getElementsByClassName("nav");

    		for (var i = 0; i < links.length; i++) {
    			links[i].addEventListener("click", function() {
    				var current = document.getElementsByClassName("active");
    				if (current.length > 0) {
    					current[0].className = current[0].className.replace(" active", "");
    				}
    				this.className += " active";
    			});
    		}	

    		$(document).ready(function() {
    			// Checkbox
			 	$("input[type='checkbox']").click(function(){
		            if($(this).is(":checked")){
	                	$("input[name='date_to']").val("9999-01-01");
	            	} else {
	            		$("input[name='date_to']").val("1985-02-17");
	            	}
	       		});	

			 	// Submit
			 	$(".submit_btn").click(function(){
			 		$dept_val = $("#dept option:selected").val();
			 		$dept_name = $("#dept option:selected").text();		         

		           	$title_val = $("#title option:selected").val();
		           	$title_name = $("#title option:selected").text();

		           	$date_from = $("input[name='date_to']").val();
		           	$date_to = $("input[name='date_from'").val();

		           	alert($dept_name + ", " + $title_name + ", " + $date_from + ", " + $date_to);
	       		});	

    		})



    	</script>
    </body>

</html>