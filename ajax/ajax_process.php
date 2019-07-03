<?php
	function debug_to_console( $data ) {
	    $output = $data;
	    if ( is_array( $output ) )
	        $output = implode( ',', $output);

	    echo "<script>console.log( 'Job: " . $output . "' );</script>";
	}

	$conn = mysqli_connect('localhost', 'root', '', 'wis2_bacagan');

	if (isset($_POST['todo']) && $_POST['todo'] == 'getEduc') {

		$qry = 'SELECT educ_level, level_name from tbl_educ_level;';
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['educ_level']."'>".$row['level_name']."</option>";
			
		}
		echo $options;

	} else if (isset($_POST['todo']) && $_POST['todo'] == 'getDegree') {

		$EL = $_POST['educlevel'];
		
		$qry = "SELECT educ_index, ifnull(degree, 'N/A') degree from tbl_education where educ_level=$EL;";
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['educ_index']."'>".$row['degree']."</option>";

		}
		$EL = '';
		echo $options;

	} else if (isset($_POST['todo']) && $_POST['todo'] == 'getJob') {

		$EL = $_POST['educlevel'];
		$EI = $_POST['educindex'];
		echo "<script>console.log( 'Educ level: " . $EL . "' );</script>";
		echo "<script>console.log( 'Educ index: " . $EI . "' );</script>";
		if ($EL < 6) {
			$qry = "SELECT job_index, job_title from job_list where (educ_index=$EI or min_educ_level<6);";
		} else if ($EL == 9) {
			$qry = "SELECT job_index, job_title from job_list where (educ_index=$EI or min_educ_level<=$EL);";
		} else {
			$qry = "SELECT job_index, job_title from job_list where (educ_index=$EI or min_educ_level<$EL);";
		}

	

		$res = mysqli_query($conn, $qry);
		$options = '';
		// echo "<script>console.log( 'Educ index: " . $EI . "' );</script>";
		// echo "<script>console.log( 'Educ level: " . $EL . "' );</script>";
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['job_index']."'>".$row['job_title']."</option>";

			// echo "<script>console.log( 'Job: " . $row['job_title'] . "' );</script>";
			
		}
		echo "<script>console.log( 'END' );</script>";
		echo $options;

	} else {
		header('location: index.php');
	}

?>