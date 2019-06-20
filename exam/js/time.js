$(function(){
	

	// the following is to handle cases where the times are on the opposite side of
	// midnight e.g. when you want to get the difference between 9:00 PM and 5:00 AM
	setInterval(function(){
		var now = new Date();
		var timeup = new Date(2019, 5, 13,  20, 30);
		if (timeup > now) {
			var diff = timeup - now;
			var msec = diff;
			var hh = Math.floor(msec / 1000 / 60 / 60);
			msec -= hh * 1000 * 60 * 60;
			var mm = Math.floor(msec / 1000 / 60);
			msec -= mm * 1000 * 60;
			var ss = Math.floor(msec / 1000);
			msec -= ss * 1000;
			$(".time").text((hh<10? "0"+hh : hh)+":"+(mm<10? "0"+mm : mm)+":"+(ss<10? "0"+ss : ss));
		}else{
			$(".time").text("TIMES UP");
		}
	},1000);
	$("#student").on("keydown", function(e){
		if(e.which==13){
			$.ajax({
				type: "POST",
				url: "dom.php",
				data:{
					stud: $(this).val()					
				},
				success: function(){
					alert("Good Luck "+$("#student").val());
				}
			});
		}
	});
		
});