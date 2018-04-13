$(document).ready(function(){
    $("#burger-container").on("click", function () {
        $(this).toggleClass("open");
        $(".header-menu").toggleClass("active");
    });
});

// SUB MENU
$("#sort-down").click( function () {
	$(".header-sub-menu").slideToggle("400");
});