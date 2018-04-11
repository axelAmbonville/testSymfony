var user = 'NomUser';
var qui=0;
		$(document).ready(function(){
			$(window).keydown(function(event){
				if(event.keyCode==13){
						event.preventDefault();
					if($('#message').val()===""){
						alert('Le champ est vide !');
						console.log(message);
					}

					else{
							if (qui==0) {
								$('#send').click(function(e){
									e.preventDefault();
									var mess = $('#message').val();
									var message = '<div class="publish"><div class="round"></div> <p>'+ user +' : ' + mess + '</p></div>';
									$('.chat').append(message);
									e.stopImmediatePropagation();
									document.getElementById("message").value="";
								});
							}

							else if(qui==1){
								$('#send').click(function(e){
									e.preventDefault();
									var mess = $('#message').val();
									var message = '<div class="publish_me"><div class="round"></div> <p>'+ user +' : ' + mess + '</p></div>';
									$('.chat').append(message);
									e.stopImmediatePropagation();
									document.getElementById("message").value="";
								});
							}
						
						$('#send').click();
					}
				}
			});
		});