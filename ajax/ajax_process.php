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
		echo $options;

	} else if (isset($_POST['todo']) && $_POST['todo'] == 'getJob') {

		$EL = $_POST['educlevel'];
		$EI = $_POST['educindex'];

		$qry = "SELECT job_index, job_title from job_list join tbl_education on job_list.educ_index=tbl_education.educ_index join tbl_educ_level on tbl_educ_level.educ_level=tbl_education.educ_level where (job_list.educ_index=$EI or tbl_education.educ_level<$EL);";
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['job_index']."'>".$row['job_title']."</option>";
			debug_to_console($row['job_title']);
		}
		
		echo $options;

	} else {
		header('location: index.php');
	}

?>