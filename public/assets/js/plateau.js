		var carte=new Array();
		var distrib_end=0;
		var compteur=0;

		$(document).ready(function(){
			$('.act').hide();
			$('.hand').unbind();
			$('.hand_selected').unbind();
			$('.button_open_chat').click(function(){
				$('.contain_chat_in').toggleClass('is_open');
			});
			$('.act_click').unbind();
			var deck=setInterval(function(){
				compteur=compteur+1;
				$('.deck').append('<div class="carte"><img src="/hanamikoji/public/assets/images/plateau/background.png" height="100%"></div>');	
				$('.carte').last().animate({'left':'0px'});
				if (compteur==20) {
					clearInterval(deck);
					distrib_end=1;
					show_maitre();
				}
			},60);


			function show_maitre(){
				if(distrib_end==1){
					rotate();
					$('.act_click').bind('click',function(){
						$(this).addClass('current_power');
						$(this).removeClass('act_click');
						tour();
					});
				}
			}
			

			function rotate(){
				$('#maitre1').css({'transform':'rotateY(180deg)','transition-delay':'1s'});
				$('#maitre2').css({'transform':'rotateY(180deg)','transition-delay':'1.1s'});
				$('#maitre3').css({'transform':'rotateY(180deg)','transition-delay':'1.2s'});
				$('#maitre4').css({'transform':'rotateY(180deg)','transition-delay':'1.3s'});
				$('#maitre5').css({'transform':'rotateY(180deg)','transition-delay':'1.4s'});
				$('#maitre6').css({'transform':'rotateY(180deg)','transition-delay':'1.5s'});
				$('#maitre7').css({'transform':'rotateY(180deg)','transition-delay':'1.6s'});
			}

			function tour(){
				if ($('#act1').hasClass('current_power')) {

					//désactiver les autres boutons
					$('.act_click').hide();
					//montrer le panneaux d'action
					$('#action1').show();
					// quand on clique sur les carte
					$('.hand').bind('click',function(){
						//on change la carte de parent
						$(this).appendTo('#action1 .emplacement');
						$(this).addClass('hand_selected');
						$(this).removeClass('hand');
						$('.hand').unbind();
						//j'attribue l'id de la carte a la value input du form de l'action en cours
						var valeur_input = $('#empl1').children().attr('id');
						$('#input1').val(valeur_input); 
						$('#sub1').css({'visibility':'visible'});
					});
					//au close
					$('#action1 .cancel').click(function(){
						location.reload(true);
					});
				}
				else if($('#act2').hasClass('current_power')){
					$('.act_click').hide();
					$('#action2').show();
					$('#empl2_1').addClass('current_emplacement');
					if($('#empl2_1').hasClass('current_emplacement')){
							$('.hand').bind('click',function(){
								$(this).appendTo('.current_emplacement');
								$(this).addClass('hand_selected');
								$(this).removeClass('hand');
								$('.hand_selected').unbind();
								var valeur_input = $('#empl2_1').children().attr('id');
								$('#input2_1').val(valeur_input); 
								$('.current_emplacement').removeClass('current_emplacement');
								$('#empl2_2').addClass('current_emplacement');
									if($('#empl2_2').hasClass('current_emplacement')){
										$('.hand').bind('click',function(){
											$(this).appendTo('.current_emplacement');
											var valeur_input2 = $('#empl2_2').children().attr('id');
											$('#input2_2').val(valeur_input2); 
											$('#sub2').css({'visibility':'visible'});
											$('#empl2_2').removeClass('current_emplacement');
											$('#empl2_2').addClass('end_tour');
												if ($('#empl2_2').hasClass('end_tour')) {
													$('.hand').unbind();
												}
										});
									}
							});
						}
					 	
					
					//au close
					$('#action2 .cancel').click(function(){
						location.reload(true);
					});
				}
				else if($('#act3').hasClass('current_power')){
					$('.act_click').hide();
					$('#action3').show();
					$('#empl3_1').addClass('current_emplacement');
					if($('#empl3_1').hasClass('current_emplacement')){
						$('.hand').bind('click',function(){
							$(this).appendTo('.current_emplacement');
							$(this).addClass('hand_selected');
							$(this).removeClass('hand');
							$('.hand_selected').unbind();
							var valeur_input = $('#empl3_1').children().attr('id');
							$('#input3_1').val(valeur_input);
							$('.current_emplacement').removeClass('current_emplacement');
							$('#empl3_2').addClass('current_emplacement');
								if ($('#empl3_2').hasClass('current_emplacement')) {
									$('.hand').bind('click',function(){
										$(this).appendTo('.current_emplacement');
										$(this).addClass('hand_selected');
										$(this).removeClass('hand');
										var valeur_input2 = $('#empl3_2').children().attr('id');
										$('#input3_2').val(valeur_input2);
										$('#empl3_2').removeClass('current_emplacement');
										$('#empl3_3').addClass('current_emplacement');
											if ($('#empl3_3').hasClass('current_emplacement')) {
												$('.hand').bind('click',function(){
													$(this).appendTo('.current_emplacement');
													$(this).addClass('hand_selected');
													$(this).removeClass('hand');
													var valeur_input3 = $('#empl3_3').children().attr('id');
													$('#input3_3').val(valeur_input3);
													$('#sub3').css({'visibility':'visible'});
													$('#empl3_3').removeClass('current_emplacement');
													$('#empl3_3').addClass('end_tour');
														if ($('#empl3_3').hasClass('end_tour')) {
															$('.hand').unbind();
														}
												});
											}
									});
								}
						});
					}					
					//au close
					$('#action3 .cancel').click(function(){
						location.reload(true);
					});
				}
				else if($('#act4').hasClass('current_power')){
					$('.act_click').hide();
					$('#action4').show();
					$('#empl4_1').addClass('current_emplacement');
					if($('#empl4_1').hasClass('current_emplacement')){
						$('.hand').bind('click',function(){
							$(this).appendTo('.current_emplacement');
							$(this).addClass('hand_selected');
							$(this).removeClass('hand');
							$('.hand_selected').unbind();
							var valeur_input = $('#empl4_1').children().attr('id');
							$('#input4_1').val(valeur_input);
							$('.current_emplacement').removeClass('current_emplacement');
							$('#empl4_2').addClass('current_emplacement');
								if ($('#empl4_2').hasClass('current_emplacement')) {
									$('.hand').bind('click',function(){
										$(this).appendTo('.current_emplacement');
										$(this).addClass('hand_selected');
										$(this).removeClass('hand');
										var valeur_input2 = $('#empl4_2').children().attr('id');
										$('#input4_2').val(valeur_input2);
										$('#empl4_2').removeClass('current_emplacement');
										$('#empl4_3').addClass('current_emplacement');
											if ($('#empl4_3').hasClass('current_emplacement')) {
												$('.hand').bind('click',function(){
													$(this).appendTo('.current_emplacement');
													$(this).addClass('hand_selected');
													$(this).removeClass('hand');
													$('.hand_selected').unbind();
													var valeur_input3 = $('#empl4_3').children().attr('id');
													$('#input4_3').val(valeur_input3);
													$('#empl4_3').removeClass('current_emplacement');
													$('#empl4_4').addClass('current_emplacement');
														if($('#empl4_4').hasClass('current_emplacement')){
															$('.hand').bind('click',function(){
																$(this).appendTo('.current_emplacement');
																$(this).addClass('hand_selected');
																$(this).removeClass('hand');
																var valeur_input4 = $('#empl4_4').children().attr('id');
																$('#input4_4').val(valeur_input4);
																$('#sub4').css({'visibility':'visible'});
																$('#empl4_4').removeClass('current_emplacement');
																$('#empl4_4').addClass('end_tour');
																	if ($('#empl4_4').hasClass('end_tour')) {
																		$('.hand').unbind();
																	}
															});
														}
												});
											}
									});
								}
						});
					}					
					//au close
					$('#action4 .cancel').click(function(){
						location.reload(true);
					});
				}
			}

		});