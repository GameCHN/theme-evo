jQuery(function($) {

var ww = document.body.clientWidth;

jQuery(document).ready(function($){

	//Superfish
	$("ul.sf-menu").superfish({
		dropShadows:   false
	});

	/* Small Screens Menu Slide Down/Up */
    $("#topmenu-button").click(function(){
        $("#small-screens-menu nav").slideToggle("slow");
        return false;
    });

	/* toggle nav */
	$("#menu-icon").on("click", function(){
	        jQuery(".sf-menu").toggle();
	        jQuery(this).toggleClass("active");
	});


	/*PRETTYPHOTO STARTS*/
    $("a[class^='prettyPhoto']").prettyPhoto({
	    	animationSpeed:'slow',
	    	theme:'facebook', 
	    	hideflash: true,
	    	wmode: 'opaque', 
	    	slideshow:2000}
	    );
	/*PRETTYPHOTO ENDS*/


});






});