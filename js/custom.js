//smoth scroll


/*add smooth scrolling */

$(document).ready(function(){
 //'use strict';
 $('.nav-item').click(function(){

  if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;



  }
}


 });
});


//add and remove active class
$(document).ready(function(){

$('.navbar-nav li a').click(function(){
	$('.navbar-nav li a').parent().removeClass('active');
	$(this).parent().addClass("active");
})
});