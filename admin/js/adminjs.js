
        $(".dropSubside1").click(function(){
            $(".subside1").toggleClass("d-block");
            
        });
        $(".dropSubside2").click(function(){
            $(".subside2").toggleClass("d-block");
        });
        $(".dropSubside3").click(function(){
            $(".subside3").toggleClass("d-block");
        });


		function getDateTime(){
			var dateTime = new Date();
			$('.dateTime').html(dateTime.toLocaleTimeString());
		}
		$(document).ready(function(){
			setInterval(getDateTime, 1000);
		});
		function getDateTime(){
			var date = new Date();
			$('.dateTime').html(date.toLocaleTimeString());
		}
		$(document).ready(function(){
			setInterval(getDateTime, 1000);
		});