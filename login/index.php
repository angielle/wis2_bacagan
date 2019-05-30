<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">	
	<style>
	* {
		padding: 5;
	}	

	.grid-container {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-template-rows: auto;
		grid-gap: 10px;
		grid-template-areas: 
			"main main main";
	}

	.mel-1 {
		background-color:  #A2D729	;
	}

	.mel-2 {
		background-color: #A2E3C4;
	}

	.mel-3 {
		background-color:  #3C493F;
	}

	.mel-4 {
		background-color:  #466E88;
	}

	.mel-5 {
		background-color:  #D34E24;
	}

	.mel-6 {
		background-color:  #270722;
	}

	.mel-7 {
		background-color: #BA5A31;
	}

	.mel-8 {
		background-color: #C5283D;
	}


	.mel-9 {
		background-color: #C5D86D;
	}

	.job {
		margin: 5px;
	}



	</style>
</head>
<body>
	<?php 		 
		$conn = new mysqli("localhost", 'root', '', 'wis2_bacagan');
		session_start();
 		$un = $_SESSION['un'];
	 	if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$user_query = "SELECT tbl_users.user_index, username, concat(fname, ' ', mname, ' ', lname) as full, tbl_education.educ_level, tbl_personal_info.educ_index, level_name, ifnull(degree,'N/A') as degree, tbl_education.educ_level from tbl_personal_info join tbl_education on tbl_personal_info.educ_index = tbl_education.educ_index join tbl_users on tbl_users.user_index = tbl_personal_info.user_index join tbl_educ_level on tbl_education.educ_level = tbl_educ_level.educ_level where tbl_users.user_index = '$un'";

		$user_result = mysqli_query($conn, $user_query);

	    while($user_row =  mysqli_fetch_array($user_result)) {
		    echo "<div class='alert alert-success' role='alert'>";
		  	echo "<h4 class='alert-heading'>".$user_row['full']."</h4>";
			echo "<p class='mb-0'>Educational Attainment: ".$user_row['level_name']."</p>";
			echo "<p class='mb-0'>Degree Finished: ".$user_row['degree']."</p>";
			echo "</div>";

			$uei = $user_row['educ_index'];
			$uel = $user_row['educ_level'];

			$job_query = "SELECT job_index, job_title, job_description, company, name as company_name, logo_name, concat('Finished at least ', level_name) as level_name, min_educ_level, ifnull(degree , 'N/A') as degree
			from tbl_education 
			join tbl_educ_level on tbl_education.educ_level = tbl_educ_level.educ_level 
			join job_list on tbl_education.educ_index = job_list.educ_index
			join company on job_list.company = company.company_index 
			where tbl_education.educ_index ='".$uei."'"." or (min_educ_level<=".$uel." and min_educ_level<6)";	

			$job_result = mysqli_query($conn, $job_query);

			echo '<div class="grid-container">';

			while($job_row = mysqli_fetch_array($job_result)) {
				echo '<div class="grid-item main job mel-'.$job_row['min_educ_level'].'" data-id="'.$job_row['job_index'].'" data-desc="'.$job_row['job_description'].'" data-company="'.$job_row['company_name'].'" data-logo="'.$job_row['logo_name'].'" data-lname="'.$job_row['level_name'].'" data-deg="'.$job_row['degree'].'" data-logo="'.$job_row['logo_name'].'" data-toggle="modal"  data-target="#jobModal">';
				echo '<h5 class="text-center" style="color: white; margin: 20px">'.$job_row['job_title'].'</h5>';
				echo '</div>';
			}

			echo '</div>';
    	}


	  	?>

	 <!-- Modal -->
	<div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<div class="row">
	      		<div class="col-sm-4">
	      			<img id="logo" src="https://via.placeholder.com/100" width="100" height="100">
	      		</div>
	      		<div class="col-sm-8">
	      			<h4 class="modal-title" id="jobTitle">Job title</h4>	
	      			<h7 id="company">Company</h7>
	      		</div>

	      	</div>	
	      </div>
	      <div>
	        
	      </div>

	      <div class="modal-body">
	      	<p id="jobDesc">Job description</p>
	      	<span class="badge badge-pill badge-success" id="levelName">Level Names</span>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>
<script text="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
$('.job').on('click', function(){
	let jobTitle = $(this).text();
	let jobDesc = $(this).attr('data-desc');
	let levelName = $(this).attr('data-lname');
	let degree = $(this).attr('data-deg');
	let company = $(this).attr('data-company');
	let logo = $(this).attr('data-logo');
	let bg = $(this).css('background-color');

	// Display data
	$('#jobTitle').text(jobTitle);
	$('#jobDesc').text(jobDesc);
	(degree == 'N/A') ? $('#levelName').text(levelName) : $('#levelName').text(levelName + ' (' + degree + ')');
	$('#jobDesc').text(jobDesc);
	$('#company').text('Job offer from ' + company);
	$('#logo').attr('src', 'assets/' + logo);

	// Change css styles
	$('.modal-header').css({'background-color': bg, 'color': 'white'});
})
</script>
</html>