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
    </head>


    <body>
    	<nav>
    		<a href="" class="active">Company Statistics</a>
    		<a href="">Employee Count</a>
    		<a href="">Employee Salaries</a>
    	</nav>

		<section class="container">
			<div class="card-container">
	    		<div class="card">

		    		<h5>Department</h5>
		    		<select id="dept">
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>

					<h5>Title</h5>
		    		<select id="title">
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>

					<h5>Date Range</h5>
					<p>From</p>
					<input type="date" name="date_from">
					<p>To</p>
					<input type="date" name="date_to">

					<input type="checkbox" name="current"> Current

					<div class="button-container">
						<button type="button" class="submit_btn">SUBMIT</button>
					</div>

	    		</div>
    		</div>	
		</section>
    	<script type="text/javascript">
    		$(document).ready(function() {
    			$('a').click(function(e) {
    				$('a.active').removeClass('active')
    				debugger;

    				var $parent = $(this).parent();
    				$parent.addClass('active');
    				e.preventDefault();
    			})
    		});

    		// $("#dept").change(function() {
    		// 	var $select = $(this);

    		// 	$.ajax({
    		// 		url: 'process.ph',
    		// 		type: 'post',
    		// 		data:{dept_no:dept_no},
		    //         success:function(response){
		    //             var len = response.length;

		    //             $("#dept").empty();
		    //             for( var i = 0; i<len; i++){
		    //                 var no = response[i]['no'];
		    //                 var name = response[i]['name'];
		                    
		    //                 $("#dept").append("<option value='"+no+"'>"+name+"</option>");

		    //             }
		    //         }
    		// 	})
    		// })
    	</script>
    </body>

</html>