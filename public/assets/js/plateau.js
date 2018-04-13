var distrib_end=0;
var compteur=0;
var distrib=0;
var test=1;

$(document).ready(function(){
    $('.act').hide();
    $('.hand').unbind();
    $('.hand_selected').unbind();
    $('.button_open_chat').click(function(){
        $('.contain_chat_in').toggleClass('is_open');
        $('.contain_chat').toggleClass('is-over');
    });
    $('.act_click').unbind();
    if (letour==0) {
        var deck=setInterval(function(){
            compteur=compteur+1;
            $('.deck').append('<div class="carte"><img src="/images/plateau/background.png" height="100%"></div>');
            $('.carte').last().animate({'left':'0px'});
            if (compteur==20) {
                clearInterval(deck);
                rotate();
            }
        },60);
    }

    else if(letour==1){
        $('.deck').append('<div class="carte" style="left:0%;"><img src="/images/plateau/background.png" height="100%"></div>')
        $('#maitre1,#maitre2,#maitre3,#maitre4,#maitre5,#maitre6,#maitre7').css({'transform':'rotateY(180deg)'});
        $('.main_user').css({'visibility':'visible', 'top':'76%','left':'20%'});
        $('.hand').css('margin','0.5%');
        $('.act_click').bind('click',function(){
            $(this).addClass('current_power');
            $(this).removeClass('act_click');
            tour();
        });
    }

    //Distribution des cartes dans la main
    function distribution(){
        $('.main_user').css('visibility','visible');
        $('.main_user').animate({'top':'76%','left':'20%'});
        setTimeout(function(){
            $('.hand').css({'margin':'0.5%'});
        },300);
        $('.act_click').bind('click',function(){
            $(this).addClass('current_power');
            $(this).removeClass('act_click');
            tour();
        });
    }
    // retourner les cartes maitre
    function rotate(){
        $('#maitre1').css({'transform':'rotateY(180deg)','transition-delay':'1s'});
        $('#maitre2').css({'transform':'rotateY(180deg)','transition-delay':'1.1s'});
        $('#maitre3').css({'transform':'rotateY(180deg)','transition-delay':'1.2s'});
        $('#maitre4').css({'transform':'rotateY(180deg)','transition-delay':'1.3s'});
        $('#maitre5').css({'transform':'rotateY(180deg)','transition-delay':'1.4s'});
        $('#maitre6').css({'transform':'rotateY(180deg)','transition-delay':'1.5s'});
        $('#maitre7').css({'transform':'rotateY(180deg)','transition-delay':'1.6s'});
        distribution();
    }
    //Fonction qui détermine l'action que le joueur a choisit
    function tour(){
        letour=letour+1;
        if ($('#act1').hasClass('current_power')) {

            //désactiver les autres boutons
            $('.act_click').hide();
            //montrer le panneaux d'action
            $('#action1').show();
            // quand on clique sur les carte
            $('.hand').bind('click',function(){
                //on change la carte de parent
                $(this).appendTo('#action1 .emplacement');
                $(this).addClass('hand_selected').animate({'height':'90%'});
                $(this).removeClass('hand');
                $('.hand').unbind();
                //j'attribue l'id de la carte a la value input du form de l'action en cours
                var valeur_input = $('#empl1').children().attr('id');
                $('#input1').val(valeur_input);
                $('#sub1').css({'visibility':'visible'});
                $('#empl1').addClass('end_tour');
                retire();
            });
            //au close
            $('#action1 .cancel').click(function(){
                window.location.reload(true);
            });
        }

        else if($('#act2').hasClass('current_power')){
            $('.act_click').hide();
            $('#action2').show();
            $('#empl2_1').addClass('current_emplacement');

            if($('#empl2_1').hasClass('current_emplacement')){
                $('.hand').bind('click',function(){
                    $(this).appendTo('.current_emplacement');
                    $(this).addClass('hand_selected').animate({'height':'90%'});
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
                            $('#empl2_2,#empl2_1').addClass('end_tour');
                            retire2();
                        });
                    }
                });
            }

            //au close
            $('#action2 .cancel').click(function(){
                window.location.reload(true);
            });
        }

        else if($('#act3').hasClass('current_power')){
            $('.act_click').hide();
            $('#action3').show();
            $('#empl3_1').addClass('current_emplacement');

            if($('#empl3_1').hasClass('current_emplacement')){
                $('.hand').bind('click',function(){
                    $(this).appendTo('.current_emplacement');
                    $(this).addClass('hand_selected').animate({'height':'90%'});
                    $(this).removeClass('hand');
                    $('.hand_selected').unbind();
                    var valeur_input = $('#empl3_1').children().attr('id');
                    $('#input3_1').val(valeur_input);
                    $('.current_emplacement').removeClass('current_emplacement');
                    $('#empl3_2').addClass('current_emplacement');
                    if ($('#empl3_2').hasClass('current_emplacement')) {
                        $('.hand').bind('click',function(){
                            $(this).appendTo('.current_emplacement');
                            $(this).addClass('hand_selected').animate({'height':'90%'});
                            $(this).removeClass('hand');
                            var valeur_input2 = $('#empl3_2').children().attr('id');
                            $('#input3_2').val(valeur_input2);
                            $('#empl3_2').removeClass('current_emplacement');
                            $('#empl3_3').addClass('current_emplacement');
                            if ($('#empl3_3').hasClass('current_emplacement')) {
                                $('.hand').bind('click',function(){
                                    $(this).appendTo('.current_emplacement');
                                    $(this).addClass('hand_selected').animate({'height':'90%'});
                                    $(this).removeClass('hand');
                                    var valeur_input3 = $('#empl3_3').children().attr('id');
                                    $('#input3_3').val(valeur_input3);
                                    $('#sub3').css({'visibility':'visible'});
                                    $('#empl3_3').removeClass('current_emplacement');
                                    $('#empl3_1,#empl3_2,#empl3_3').addClass('end_tour');
                                    retire3();
                                });
                            }
                        });
                    }
                });
            }
            //au close
            $('#action3 .cancel').click(function(){
                window.location.reload(true);
            });
        }
        else if($('#act4').hasClass('current_power')){
            $('.act_click').hide();
            $('#action4').show();
            $('#empl4_1').addClass('current_emplacement');
            if($('#empl4_1').hasClass('current_emplacement')){
                $('.hand').bind('click',function(){
                    $(this).appendTo('.current_emplacement');
                    $(this).addClass('hand_selected').animate({'height':'90%'});
                    $(this).removeClass('hand');
                    $('.hand_selected').unbind();
                    var valeur_input = $('#empl4_1').children().attr('id');
                    $('#input4_1').val(valeur_input);
                    $('.current_emplacement').removeClass('current_emplacement');
                    $('#empl4_2').addClass('current_emplacement');
                    if ($('#empl4_2').hasClass('current_emplacement')) {
                        $('.hand').bind('click',function(){
                            $(this).appendTo('.current_emplacement');
                            $(this).addClass('hand_selected').animate({'height':'90%'});
                            $(this).removeClass('hand');
                            var valeur_input2 = $('#empl4_2').children().attr('id');
                            $('#input4_2').val(valeur_input2);
                            $('#empl4_2').removeClass('current_emplacement');
                            $('#empl4_3').addClass('current_emplacement');
                            if ($('#empl4_3').hasClass('current_emplacement')) {
                                $('.hand').bind('click',function(){
                                    $(this).appendTo('.current_emplacement');
                                    $(this).addClass('hand_selected').animate({'height':'90%'});
                                    $(this).removeClass('hand');
                                    $('.hand_selected').unbind();
                                    var valeur_input3 = $('#empl4_3').children().attr('id');
                                    $('#input4_3').val(valeur_input3);
                                    $('#empl4_3').removeClass('current_emplacement');
                                    $('#empl4_4').addClass('current_emplacement');
                                    if($('#empl4_4').hasClass('current_emplacement')){
                                        $('.hand').bind('click',function(){
                                            $(this).appendTo('.current_emplacement');
                                            $(this).addClass('hand_selected').animate({'height':'90%'});
                                            $(this).removeClass('hand');
                                            var valeur_input4 = $('#empl4_4').children().attr('id');
                                            $('#input4_4').val(valeur_input4);
                                            $('#sub4').css({'visibility':'visible'});
                                            $('#empl4_4,#empl4_3,#empl4_2,#empl4_1').addClass('end_tour');
                                            $('#empl4_4').removeClass('current_emplacement');
                                            retire4();
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
                window.location.reload(true);
            });
        }
    }


    function retire(){
        if ($('#empl1').hasClass('end_tour')) {
            $('#empl1').bind('click',function(){
                $('#sub1').css({'visibility':'hidden'});
                $('#empl1').children().removeClass('hand_selected').addClass('hand');
                $('#empl1').children().appendTo('.main_user');
                $('#empl1').addClass('current_emplacement_local');

                if($('#empl1').hasClass('current_emplacement_local')){
                    $('.hand').bind('click',function(){
                        $('#sub1').css({'visibility':'visible'});
                        $(this).appendTo('.current_emplacement_local');
                        $(this).addClass('hand_selected').animate({'height':'90%'});;
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl1').children().attr('id');
                        $('#input1').val(valeur_input);
                        $('.current_emplacement_local').removeClass('current_emplacement_local');
                        $('#empl1').addClass('end_tour');
                        retire();
                    });
                }
            });
            $('.hand').unbind();
        }
    }


    //fonction qui sert a pouvoir retirer les carte des emplacements de l'action2
    function retire2(){
        if ($('#empl2_2').hasClass('end_tour')) {
            $('#empl2_2').bind('click',function(e){
                $('#sub2').css('visibility','hidden');
                $('#empl2_2').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl2_2').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl2_2').addClass('current_emplacement_local');

                if($('#empl2_2').hasClass('current_emplacement_local')){

                    $('#empl2_1').removeClass('end_tour');
                    $('#empl2_1').unbind();

                    $('.hand').bind('click',function(e){
                        $('#sub2').css('visibility','visible');
                        $(this).appendTo('.current_emplacement_local');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl2_2').children().attr('id');
                        $('#input2_2').val(valeur_input);
                        $('.current_emplacement_local').removeClass('current_emplacement_local');
                        $('#empl2_1').addClass('end_tour');
                        retire2();
                    });
                }
            });
            $('.hand').unbind();
        }

        if($('#empl2_1').hasClass('end_tour')){
            $('#empl2_1').bind('click',function(e){
                $('#sub2').css('visibility','hidden');
                $('#empl2_1').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);

                $('#empl2_1').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl2_1').addClass('current_emplacement');

                if($('#empl2_1').hasClass('current_emplacement')){
                    $('#empl2_2').removeClass('end_tour');
                    $('#empl2_2').unbind();
                    $('.hand').bind('click',function(e){
                        $('#sub2').css('visibility','visible');
                        $(this).appendTo('.current_emplacement');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl2_1').children().attr('id');
                        $('#input2_1').val(valeur_input);
                        $('.current_emplacement').removeClass('current_emplacement');
                        $('#empl2_2').addClass('end_tour');
                        retire2();
                    });
                }
            });
            $('.hand').unbind();
        }
    }


    function retire3(){

        if ($('#empl3_1').hasClass('end_tour')) {
            $('#empl3_1').bind('click',function(e){
                $('#sub3').css('visibility','hidden');
                $('#empl3_1').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl3_1').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl3_1').addClass('current_emplacement_local');
                if($('#empl3_1').hasClass('current_emplacement_local')){

                    $('#empl3_2,#empl3_3').removeClass('end_tour');
                    $('#empl3_2,#empl3_3').unbind();

                    $('.hand').bind('click',function(e){
                        $('#sub3').css('visibility','visible');
                        $(this).appendTo('.current_emplacement_local');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl3_1').children().attr('id');
                        $('#input3_1').val(valeur_input);
                        $('.current_emplacement_local').removeClass('current_emplacement_local');
                        $('#empl3_2,#empl3_3').addClass('end_tour');
                        retire3();
                    });
                }
            });
            $('.hand').unbind();
        }

        if($('#empl3_2').hasClass('end_tour')){
            $('#empl3_2').bind('click',function(e){
                $('#sub3').css('visibility','hidden');
                $('#empl3_2').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl3_2').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl3_2').addClass('current_emplacement');

                if($('#empl3_2').hasClass('current_emplacement')){

                    $('#empl3_1,#empl3_3').removeClass('end_tour');
                    $('#empl3_1,#empl3_3').unbind();
                    $('.hand').bind('click',function(e){
                        $('#sub3').css('visibility','visible');
                        $(this).appendTo('.current_emplacement');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl3_2').children().attr('id');
                        $('#input3_2').val(valeur_input);
                        $('.current_emplacement').removeClass('current_emplacement');
                        $('#empl3_1,#empl3_3').addClass('end_tour');
                        retire3();
                    });
                }
            });
            $('.hand').unbind();
        }

        if($('#empl3_3').hasClass('end_tour')){
            $('#empl3_3').bind('click',function(e){
                $('#sub3').css('visibility','hidden');
                $('#empl3_3').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl3_3').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl3_3').addClass('current_emplacement_third');

                if($('#empl3_3').hasClass('current_emplacement_third')){

                    $('#empl3_1,#empl3_2').removeClass('end_tour');
                    $('#empl3_1,#empl3_2').unbind();
                    $('.hand').bind('click',function(e){
                        $('#sub3').css('visibility','visible');
                        $(this).appendTo('.current_emplacement_third');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl3_3').children().attr('id');
                        $('#input3_3').val(valeur_input);
                        console.log('bonjour');
                        $('.current_emplacement_third').removeClass('current_emplacement_third');
                        $('#empl3_1,#empl3_2').addClass('end_tour');
                        retire3();
                    });
                }
            });
            $('.hand').unbind();
        }

    }

    function retire4(){

        if ($('#empl4_1').hasClass('end_tour')) {
            $('#empl4_1').bind('click',function(e){
                $('#sub4').css('visibility','hidden');
                $('#empl4_1').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl4_1').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl4_1').addClass('current_emplacement_local');

                if($('#empl4_1').hasClass('current_emplacement_local')){

                    $('#empl4_2,#empl4_3,#empl4_4').removeClass('end_tour');
                    $('#empl4_2,#empl4_3,#empl4_4').unbind();

                    $('.hand').bind('click',function(e){
                        $('#sub4').css('visibility','visible');
                        $(this).appendTo('.current_emplacement_local');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl4_1').children().attr('id');
                        $('#input4_1').val(valeur_input);
                        $('.current_emplacement_local').removeClass('current_emplacement_local');
                        $('#empl4_2,#empl4_3,#empl4_4').addClass('end_tour');
                        retire4();
                    });
                }
            });
            $('.hand').unbind();
        }

        if($('#empl4_2').hasClass('end_tour')){
            $('#empl4_2').bind('click',function(e){
                $('#sub4').css('visibility','hidden');
                $('#empl4_2').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl4_2').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl4_2').addClass('current_emplacement');

                if($('#empl4_2').hasClass('current_emplacement')){

                    $('#empl4_1,#empl4_3,#empl4_4').removeClass('end_tour');
                    $('#empl4_1,#empl4_3,#empl4_4').unbind();
                    $('.hand').bind('click',function(e){
                        $('#sub4').css('visibility','visible');
                        $(this).appendTo('.current_emplacement');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl4_2').children().attr('id');
                        $('#input4_2').val(valeur_input);
                        $('.current_emplacement').removeClass('current_emplacement');
                        $('#empl4_1,#empl4_3,#empl4_4').addClass('end_tour');
                        retire4();
                    });
                }
            });
            $('.hand').unbind();
        }

        if($('#empl4_3').hasClass('end_tour')){
            $('#empl4_3').bind('click',function(e){
                $('#sub4').css('visibility','hidden');
                $('#empl4_3').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl4_3').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl4_3').addClass('current_emplacement_third');

                if($('#empl4_3').hasClass('current_emplacement_third')){

                    $('#empl4_1,#empl4_2,#empl4_4').removeClass('end_tour');
                    $('#empl4_1,#empl4_2,#empl4_4').unbind();
                    $('.hand').bind('click',function(e){
                        $('#sub4').css('visibility','visible');
                        $(this).appendTo('.current_emplacement_third');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl4_3').children().attr('id');
                        $('#input4_3').val(valeur_input);
                        console.log('bonjour');
                        $('.current_emplacement_third').removeClass('current_emplacement_third');
                        $('#empl4_1,#empl4_2,#empl4_4').addClass('end_tour');
                        retire4();
                    });
                }
            });
            $('.hand').unbind();
        }

        if($('#empl4_4').hasClass('end_tour')){
            $('#empl4_4').bind('click',function(e){
                $('#sub4').css('visibility','hidden');
                $('#empl4_4').children().removeClass('hand_selected').addClass('hand').animate({'height':'100%'},80);
                $('#empl4_4').children().appendTo('.main_user');
                e.stopImmediatePropagation();
                $('#empl4_4').addClass('current_emplacement_fourth');

                if($('#empl4_4').hasClass('current_emplacement_fourth')){

                    $('#empl4_1,#empl4_2,#empl4_3').removeClass('end_tour');
                    $('#empl4_1,#empl4_2,#empl4_3').unbind();
                    $('.hand').bind('click',function(e){
                        $('#sub4').css('visibility','visible');
                        $(this).appendTo('.current_emplacement_fourth');
                        $(this).addClass('hand_selected').animate({'height':'90%'});
                        e.stopImmediatePropagation();
                        $(this).removeClass('hand');
                        $('.hand_selected').unbind();
                        var valeur_input = $('#empl4_4').children().attr('id');
                        $('#input4_4').val(valeur_input);
                        console.log('bonjour');
                        $('.current_emplacement_fourth').removeClass('current_emplacement_fourth');
                        $('#empl4_1,#empl4_2,#empl4_3').addClass('end_tour');
                        retire4();
                    });
                }
            });
            $('.hand').unbind();
        }
    }

});