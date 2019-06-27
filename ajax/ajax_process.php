<?php
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
		$qry = "select educ_index, ifnull(degree, 'N/A') degree from tbl_education where educ_level=$EL;";
		$res = mysqli_query($conn, $qry);
		$options = '';
		while ($row = mysqli_fetch_assoc($res)) {
			$options = $options."<option value='".$row['educ_index']."'>".$row['degree']."</option>";
		}
		echo $options;
	} else {
		header('location: index.php');
	}

?>