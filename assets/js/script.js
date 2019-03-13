$(document).ready(function () {
    $(".button-collapse").sideNav();
    $('select').material_select();
    $('.carousel').carousel();
     M.updateTextFields();
   M.textareaAutoResize($('#textarea1'));
   $('.dropdown-trigger').dropdown();



});


//============ SLIDER 
$(document).ready(function () {
	$(".content-box").hide();
	$(".contorol").click(function () {
		$(this).next(".content-box").slideToggle().siblings(".content-box").slideUp();
		if ($("i").hasClass("fa-plus")) {
			$(this).find("i").toggleClass("fa-minus");
		
		}
 	});
});


// =============== TABLE
// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();




//form 
$("#login-button").click(function(event){
  event.preventDefault();

$('form').fadeOut(500);
$('.wrapper').addClass('form-success');
});


		

		



 
