
function popup_function(id) {
	var popups = document.getElementsByClassName("show");
	var i;
	for (i = 0; i < popups.length; i++) {
		if (popups[i].getAttribute('id') != id)
			popups[i].classList.toggle("show");
	} 
    var popup = document.getElementById(id);
    popup.classList.toggle("show");
}
/*
$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
        	$(".ui-widget").remove();
            $(this).find('.caption').fadeIn(250);//.slideDown(250); //.fadeIn(250)
        	$(".ui-widget").remove();
//            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
        	$(".ui-widget").remove();
            $(this).find('.caption').fadeOut(250);//.slideUp(250); //.fadeOut(250)
        	$(".ui-widget").remove();
//            $(this).find('.caption').slideUp(250); //.fadeOut(250)
        }
    ); 
});*/