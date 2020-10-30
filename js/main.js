
	
		$(document).ready(function(){
			$(window).scroll(function(){
				var positionTop = $(document).scrollTop();
				console.log(positionTop);
				
				if((positionTop > 400) && (positionTop < 1000)){
					$('#pplr-one').addClass('animated fadeInLeft');
					$('#pplr-two').addClass('animated fadeIn');
					$('#pplr-three').addClass('animated fadeInRight');
				}
				if((positionTop > 850) && (positionTop <1500)){
					$('#pplr-four').addClass('animated fadeInLeftBig');
					$('#pplr-five').addClass('animated fadeInDownBig');
					$('#pplr-six').addClass('animated fadeInRightBig');
				}
				if((positionTop > 1440) && (positionTop < 1700)){
						$('#morePdt').addClass('animated slideInLeft');
				}
				if((positionTop > 2540) && (positionTop < 2850)){
					$('#cntUs').addClass('animated slideInRight');
				}
			});
		});
	
		window.addEventListener("scroll",function(){
			var navbar = document.querySelector("nav");
			navbar.classList.toggle("sticky", window.scrollY > 100);
		});

		