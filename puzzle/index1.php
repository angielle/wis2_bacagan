<!DOCTYPE html>
<html>
	<head>
		<title>Puzzle</title>
		<style>
		* {
			padding: 0;
			margin: 0;
		}
		.grid {
			display: grid;
			grid-template: 1fr 1fr 1fr/1fr 1fr 1fr;
			grid-gap: 10px;
			height: 100vh;
		}

		.box {
			padding-top: 20px;
			font-family: 'Century Gothic';
			color: white;
			font-size: 20vh;
			text-align: center;
			box-shadow: 2px 2px 2px black;
		}
	</head>
	
	</style>
	<body>
		<div class="grid">
			<div class="box 1c" style="background-color: black">A</div>
			<div class="box 2c" style="background-color: red">B</div>
			<div class="box 3c" style="background-color: orange">C</div>
			<div class="box 1c" style="background-color: yellow; color: black">D</div>
			<div class="box 2c" style="background-color: green">E</div>
			<div class="box 3c" style="background-color: blue">F</div>
			<div class="box 1c" style="background-color: indigo">G</div>
			<div class="box 2c" style="background-color: violet">H</div>
			<div class="box 3c" style="background-color: white; color: black">I</div>
		</div>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/refactor.js"></script>
    
</html>