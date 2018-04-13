			$('.btn-valider').css('visibility','hidden');


			$(".section-chat-head").click( function () {
				$(".section-chat-visible").slideToggle(400);
			});

			
			$(document).ready(function(){
				$('#pseudo').val(user);
				$('#email').val(email);

				$("#burger-container").on("click", function () {
        $(this).toggleClass("open");
        $(".header-menu").toggleClass("active");
    });

// SUB MENU
$("#sort-down").click( function () {
	$(".header-sub-menu").slideToggle("400");
});

				function scroll_to_top(div) {
		$(window).scroll(function(){
			if($(window).scrollTop()>440){
				$(div).fadeOut();
			} else{
				$(div).fadeIn();
			}
		});
	}
	scroll_to_top("#scroll_to_top");
				
				$('.btn-modifier').click(function(){
					$('.btn-valider').css('visibility','visible');
				});
				
				$('#pseudo').focusin(function(){
					$('.btn-valider').css('visibility','visible');
					document.getElementById('pseudo').value="";
					test = setInterval(function(){
							if($('#pseudo').val().length+1){
								var lepseudo=$('#pseudo').val();
								$('#pseudo').focusout(function(){
									$('#pseudo').val(lepseudo);
									clearInterval(test);
								});
								if($('#pseudo').val()==""){
									$('#pseudo').focusout(function(){
										$('#pseudo').val(user);
									});
								}
							}
					},100);
				});
				
				$('#email').focusin(function(){
					$('.btn-valider').css('visibility','visible');
					document.getElementById('email').value="";
					test = setInterval(function(){
							if($('#email').val().length+1){
								var lemail=$('#email').val();
								$('#email').focusout(function(){
									$('#email').val(lemail);
									clearInterval(test);
								});
								if($('#email').val()==""){
									$('#email').focusout(function(){
										$('#email').val(email);
									});
								}
							}
					},100);
				});
			});

			$('#mdp').focusin(function(){
				$('.btn-valider').css('visibility','visible');
			});

			$('.section-chat-body').css({'padding-right':'3%','padding-left':'3%'});
			$('.publish p').css({'margin-top':'15px'});