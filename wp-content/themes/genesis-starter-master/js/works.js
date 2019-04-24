jQuery(document).ready(function($){
	
$('#fullpage-works').fullpage({
		css3: true,
		scrollingSpeed: 700,
		autoScrolling: true,
		fitToSection: true,
		controlArrows: true,

		afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex){
		var loadedSlide = $(this);
		 //Firefox
 $('.active').bind('DOMMouseScroll', function(e){
     if(e.originalEvent.detail > 0) {
         //scroll down
           var enlace = $(this).find(".texto").find('a').attr('href');
       window.location.replace(enlace);
     }else {
         //scroll up
         
     }

     //prevent page fom scrolling
     return false;
 });

 //IE, Opera, Safari
 $('.active').bind('mousewheel', function(e){
     if(e.originalEvent.wheelDelta < 0) {
         //scroll down
           var enlace = $(this).find(".texto").find('a').attr('href');
         window.location.replace(enlace);
     }else {
         //scroll up
         
     }

     //prevent page fom scrolling
     return false;
 });
 
		}



});

 //Firefox
 $('.active').bind('DOMMouseScroll', function(e){
     if(e.originalEvent.detail > 0) {
         //scroll down
           var enlace = $(this).find(".texto").find('a').attr('href');
  		 window.location.replace(enlace);
     }else {
         //scroll up
         
     }

     //prevent page fom scrolling
     return false;
 });

 //IE, Opera, Safari
 $('.active').bind('mousewheel', function(e){
     if(e.originalEvent.wheelDelta < 0) {
         //scroll down
           var enlace = $(this).find(".texto").find('a').attr('href');
  		   window.location.replace(enlace);
     }else {
         //scroll up
         
     }

     //prevent page fom scrolling
     return false;
 });

});

