<?php
	session_start();
	$stud="";
	if(isset($_SESSION['stud'])){
		$stud=$_SESSION['stud'];
	}else if(isset($_POST['stud'])){
		$_SESSION['stud']=$_POST['stud'];
		$stud=$_POST['stud'];
	}
	
?>
<!DOCTYPE HTML>
	<html>
		<head>
			<title>WIS 2 EXAM</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<script src="./js/jquery.js"></script>
			<link rel="stylesheet" href="./css/bootstrap.css">
			<link rel="stylesheet" href="./css/animate.css">
			<script src="./js/bootstrap.js"></script>
		</head>
		<style>
			*{
				padding: 0;
				margin: 0;
			}
			.bg-uc{
				background-color: #003300;
				color: white;
			}
			.cont{
				display: grid;
				grid-template-columns: 1fr;
				grid-template-rows: 5vh 1fr 5vh;
				grid-gap: 5px;
				height: 100vh;
			}
			.part{
				background: black;
				color: white;
			}
			.bottom, .top{
				display: flex;
				flex: 1;
			}
			.exams{
				padding: 10px;
				display: grid;
				grid-template-columns: 50px 1fr 1fr 50px;
				grid-template-rows: minmax(43vh, 45vh);
				grid-gap: 10px;
			}
			.item{
				background: gray;
			}
			#item1{
				background: #ffbb00 ;
				color: black;
				font-weight: bold;
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
				grid-gap: 2.5px;
			}
			#item1 *{
				display: grid;
				justify-items: center;
				align-items: center;
				border: 0;
				overflow: hidden;
			}
			#item2{
				background: #7cbb00 ;
				color: white;
				display: grid;
				grid-template-columns: 1fr;
				grid-gap: 2.5px;
				justify-content: center;
				align-content: center;
				text-align:center;
				font-size: 5vh;
			}
			#item3{
				background: #00a1f1 ;
				color: white;
				display: grid;
				grid-template: 1fr 1fr  1fr/ 1fr 1fr 1fr;
				grid-gap: 5px;
			}
			#item3 *{
				display: grid;
				justify-items: center;
				align-items: center;
				border-radius: 2.5px;
				background-color: rgba(0,0,0,0.3);
				height: 100%;
				width: 100%;
				font-size: 5vh;
			}
			.cons{
				grid-column-start: span 3;
			}
			#item4{
				background: #f65314 ;
				color: white;
				display: grid;
				grid-template: 1fr 1fr 1fr / 1fr 1fr 1fr;
				grid-gap: 10px;
				padding: 10px;
				font-size: 3vh;
			}
			#item4 *{
				display: grid;
				place-items: center center;
				width: 100%;
				height: 100%;
			}
			.left{
				display: grid;
				align-items: center;
				justify-items: center;
				grid-column-start: 1;
				grid-column-end: 2;
				grid-row-start: 1;
				grid-row-end: 3;
			}
			.right{
				display: grid;
				align-items: center;
				justify-items: center;
				grid-column-start: 4;
				grid-column-end: 5;
				grid-row-start: 1;
				grid-row-end: 3;
			}
			.modal h1,.modal h5{
				text-align: center !important;
			}
			h1{
				font-weight: bold;
			}
		</style>
		<body>
			<div class='cont'>
				<div class='part top'>
					<input class='form-control' style='max-width: 40%; text-align: center; margin: 7.5px auto; font-weight: bold; font-size: 2vh' type='text' id='student' placeholder='Type in Your Name and Press Enter...' value='<?=$stud?>'>
				</div>
				<div class='exams'>
					<div class='left bg-uc rotate' data-direct='left'><h1><</h1></div>
					
					<!--ITEM 1-->
					<div class='item' id="item1">		
						<!--ITEM 1 START-->
						<?php
							$conn = mysqli_connect('localhost', 'root', '', 'wis2_bacagan', '3306');
							$query = "SELECT username, concat(fname, ' ', mname, ' ', lname) as full_name from tbl_users join tbl_personal_info ON tbl_users.user_index = tbl_personal_info.user_index";
							$res = mysqli_query($conn, $query);
							
							while($row = mysqli_fetch_array($res)){
								echo '<div>';
								echo $row['username'];
								echo '<br/>';
								echo $row['full_name'];
								echo '</div>';	
							}		
							
							
						?>
						<!--ITEM 1 END-->
					</div>
					
					<!--ITEM 2-->
					<!--ITEM 2 START-->
					<div class='item' id="item2" data-toggle="#modalpop" data-target="#modalpop">
						CLICK ME FOR A MODAL POPUP
					</div>
					<!--ITEM 2 END-->
					
					<!--ITEM 3-->
					<div class='item' id="item3">
						<div class='cons'></div>
						<div class='brick'>1</div>
						<div class='brick'>2</div>
						<div class='brick'>3</div>
						<div class='brick'>4</div>
						<div class='brick'>5</div>
						<div class='brick'>6</div>
					</div>
					
					<!--ITEM 4-->
					<!--ITEM 4 START-->
					<div class='item' id="item4">
						<div class='rainbow 1c' style='background-color: white'>White</div>
						<div class='rainbow 2c' style='background-color: red'>Red</div>
						<div class='rainbow 3c' style='background-color: orange'>Orange</div>
						<div class='rainbow 1c' style='background-color: yellow'>Yellow</div>
						<div class='rainbow 2c' style='background-color: green'>Green</div>
						<div class='rainbow 3c' style='background-color: blue'>Blue</div>
						<div class='rainbow 1c' style='background-color: indigo'>Indigo</div>
						<div class='rainbow 2c' style='background-color: violet'>Violet</div>
						<div class='rainbow 3c' style='background-color: black'>Black</div>
					</div>
					<!--ITEM 4 END-->
										
					<div class='right bg-uc rotate' data-direct='right'><h1>></h1></div>
				</div>
				<div class='part bottom'>
					<h5 style='text-align: center; width: 100%'>Time Remaining: <span class='time'></span> </h5>
				</div>
			</div>
			<!--ITEM 2 START-->
			<div class="modal fade" id="modalpop" tabindex="-1" role="dialog" aria-labelledby="modalpoplabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header bg-uc">
							<h5>CONGRATZ</h5>
						</div>
						<div class="modal-body">
							<h1>You Popped Me</h1>
						</div>
					</div>
				</div>
			</div>
			<!--ITEM 2 END-->
			<script>
				$(function(){

					<!--ITEM 3 START-->	
					$(".brick").on("click", function(){
						let prev = $('.cons').text();
						let clicked = $(this).text();
						$('.cons').text(prev + clicked);
					});
					<!--ITEM 3 END-->	
					
					
					<!--ITEM 4 START-->	
						$('.rainbow').on('click', function() {
							let clickedText = $(this).text();
							let clickedStyle = $(this).css('background-color');

							if ($(this).hasClass('1c')){
								$(this).text($(this).next().text());
								$(this).next().text(clickedText);
								$(this).css('background-color', $(this).next().css('background-color'));
								$(this).next().css('background-color', clickedStyle);

							} else if ($(this).hasClass('2c')) {
								let leftEl = $(this).prev().text();
								let leftElBg = $(this).prev().css('background-color');
								let rightEl = $(this).next().text();
								let rightElBg = $(this).next().css('background-color');
								$(this).prev().text(rightEl);
								$(this).prev().css('background-color', rightElBg);
								$(this).next().text(leftEl);
								$(this).next().css('background-color', leftElBg);

							} else if ($(this).hasClass('3c')) {
								$(this).text($(this).prev().text());
								$(this).prev().text(clickedText);
								$(this).css('background-color', $(this).prev().css('background-color'));
								$(this).prev().css('background-color', clickedStyle);
							}
							
						})
					<!--ITEM 4 END-->	
					
					
					<!--ITEM 5 START-->
					$(".rotate").on("click", function(){
						
						let item1 = $('#item1').css('background-color');
						let item2 = $('#item2').css('background-color');
						let item3 = $('#item3').css('background-color');
						let item4 = $('#item4').css('background-color');

						$('#item1').css('background-color', item3);
						$('#item2').css('background-color', item1);
						$('#item3').css('background-color', item4);
						$('#item4').css('background-color', item2);
												
					<!--ITEM 5 END-->	
					
						$(".item").addClass("animated pulse faster");
						$(".item").on("animationend", function(){
							$(".item").removeClass("animated pulse faster");
						});		
					});		
					$("#item1 div").each(function(){
						$(this).css("background-color", "rgb("+((Math.random()*255))+","+((Math.random()*255))+","+((Math.random()*255))+",0.8)");
					});
				});	
				
				
			</script>
		</body>
	</html>
