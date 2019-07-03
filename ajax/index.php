<html>
	<head>
		<title>AJAX Jobs</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
		<script src="./js/jquery.js"></script>
		<script src="./js/bootstrap.js"></script>
	</head>	
	<style type="text/css">
		html {
			font-family: 'Lato', sans-serif;
			font-size: 16;
	</style>
	<body>

	Education Level: <select id='educ_levels'></select>
	<br>
	Degree: <select id='education'></select>
	<br>
	Jobs: <select id='job'></select>
	</body>

	<script>
		$.ajax({
			type: 'POST',
			url: 'ajax_process.php',
			data: {
				todo: 'getEduc'
			},
			success: function (data) {
				$('#educ_levels').html(data);
				$(function(){
					$('#educ_levels').on('change', function() {
						$.ajax({
							type: 'POST',
							url: 'ajax_process.php',
							data: {
								todo: 'getDegree',
								educlevel: $('#educ_levels').val()
							},
							success: function(data) {
								$('#education').html(data);								
								$(function() {
									$('#education, #educ_levels').change(function() {
										$.ajax({
											type: 'POST',
											url: 'ajax_process.php', 
											data: {
												todo: 'getJob',
												educlevel: $('#educ_levels').val(),
												educindex: $('#education').val()
											},
											success: function(data) {
												$('#job').html(data);
											}
										});
									});									
								});
							}
						});
					});
				});
			} 
		});
	</script>
</html>