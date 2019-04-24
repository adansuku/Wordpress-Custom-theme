jQuery(document).ready(function($){

	if($(window).width() < 768) {
		 var iframe = document.querySelector('iframe');
    	atoparrow = $('#arrow-up');
		a_href = atoparrow.attr('href');
		$('#fullpage-work').fullpage({

	afterLoad: function(anchorLink, index){
		var loadedSection = $(this);
var valores = $('.section'),
		sectionW = $('.white'),
		sectionB = $('.black'),
		title = $('.title-full'),
		logoTrigger = $('.cd-logo-trigger'),
		navigationTrigger = $('.cd-nav-trigger');
		sectionL = $('.last');
		toparrow = $('.acc-project');
		bottomarrow = $('.acc-down');
		rightarrow = $('.fp-next');
		vimeo = $('.vimeo');
    

if ( $( ".vimeo" ).length ) {
    var player = new Vimeo.Player(iframe);
}

if(index != 1){
			atoparrow.removeAttr("href");
			atoparrow.click(function(){ $.fn.fullpage.moveSectionUp(); });
		} else {
			atoparrow.attr("href", a_href);
			//Firefox
 $('.active').bind('DOMMouseScroll', function(e){
     if(e.originalEvent.detail > 0) {
         //scroll down
  		   
     }else {
         //scroll up
         window.location.replace(a_href);
         
     }

     //prevent page fom scrolling
     return false;
 });

 //IE, Opera, Safari
 $('.active').bind('mousewheel', function(e){
     if(e.originalEvent.wheelDelta < 0) {
        $.fn.fullpage.moveTo(2);
     }else {
         //scroll up
         window.location.replace(a_href);
     }

     //prevent page fom scrolling
     return false;
 });
		} // Fin del else de index 1

		if ( sectionW.hasClass('active') ) {
		sectionW.addClass('black-text');
		title.addClass('black-text');
		logoTrigger.addClass('logo-visible');
		navigationTrigger.addClass('black-text')
		} else {
		sectionW.removeClass('black-text');
		title.removeClass('black-text');
		logoTrigger.removeClass('logo-visible');
		navigationTrigger.removeClass('black-text');	
		}

		if ( sectionL.hasClass('active') ) {
			logoTrigger.addClass('no-logo');
			toparrow.addClass('white-arrow');
			rightarrow.addClass('right-arrow');
			bottomarrow.addClass('remove-arrow');
		} else {
			logoTrigger.removeClass('no-logo');
			toparrow.removeClass('white-arrow');
			rightarrow.removeClass('right-arrow');
			bottomarrow.removeClass('remove-arrow');
		}

		if ( sectionB.hasClass('active') ) {
			toparrow.addClass('white-arrow-u');
			bottomarrow.addClass('white-arrow-d');
		} else {
			toparrow.removeClass('white-arrow-u');
			bottomarrow.removeClass('white-arrow-d');
		}
        if ( $( ".vimeo" ).length ) {
		if (vimeo.hasClass('active') ) {
			player.setCurrentTime(0).then(function(seconds) {
    // seconds = the actual time that the player seeked to
}).catch(function(error) {
    switch (error.name) {
        case 'RangeError':
            // the time was less than 0 or greater than the video’s duration
            break;

        default:
            // some other error occurred
            break;
    }
});

player.setVolume(1).then(function(volume) {
    // volume was set
}).catch(function(error) {
    switch (error.name) {
        case 'RangeError':
            // the volume was less than 0 or greater than 1
            break;

        default:
            // some other error occurred
            break;
    }
});

player.play().then(function() {
    // the video was played
}).catch(function(error) {
    switch (error.name) {
        case 'PasswordError':
            // the video is password-protected and the viewer needs to enter the
            // password first
            break;

        case 'PrivacyError':
            // the video is private
            break;

        default:
            // some other error occurred
            break;
    }
});

		} else {

			player.setVolume(0).then(function(volume) {
    // volume was set
}).catch(function(error) {
    switch (error.name) {
        case 'RangeError':
            // the volume was less than 0 or greater than 1
            break;

        default:
            // some other error occurred
            break;
    }
});

player.pause().then(function() {
    // the video was played
}).catch(function(error) {
    switch (error.name) {
        case 'PasswordError':
            // the video is password-protected and the viewer needs to enter the
            // password first
            break;

        case 'PrivacyError':
            // the video is private
            break;

        default:
            // some other error occurred
            break;
    }
});

		}
    }

	}

});
	$( ".acc-down" ).click(function() {
 		 $.fn.fullpage.moveSectionDown();
	});
	} else {
		var iframe = document.querySelector('iframe');
    	atoparrow = $('#arrow-up');
		a_href = atoparrow.attr('href');
		$('#fullpage-work').fullpage({


	afterLoad: function(anchorLink, index){
		var loadedSection = $(this);
var valores = $('.section'),
		sectionW = $('.white'),
		sectionB = $('.black'),
		title = $('.title-full'),
		logoTrigger = $('.cd-logo-trigger'),
		navigationTrigger = $('.cd-nav-trigger');
		sectionL = $('.last');
		toparrow = $('.acc-project');
		bottomarrow = $('.acc-down');
		rightarrow = $('.fp-next');
		vimeo = $('.vimeo');

        if ( $( ".vimeo" ).length ) {
        var player = new Vimeo.Player(iframe);
        }

		if(index != 1){
			atoparrow.removeAttr("href");
			atoparrow.click(function(){ $.fn.fullpage.moveSectionUp(); });
		} else {
			atoparrow.attr("href", a_href);
			//Firefox
 $('.active').bind('DOMMouseScroll', function(e){
     if(e.originalEvent.detail > 0) {
         //scroll down
  		   
     }else {
         //scroll up
         window.location.replace(a_href);
         
     }

     //prevent page fom scrolling
     return false;
 });

 //IE, Opera, Safari
 $('.active').bind('mousewheel', function(e){
     if(e.originalEvent.wheelDelta < 0) {
         $.fn.fullpage.moveTo(2);
     }else {
         //scroll up
         window.location.replace(a_href);
     }

     //prevent page fom scrolling
     return false;
 });
		} // Fin del else de index 1

		if ( sectionW.hasClass('active') ) {
		sectionW.addClass('black-text');
		title.addClass('black-text');
		logoTrigger.addClass('logo-visible');
		navigationTrigger.addClass('black-text')
		} else {
		sectionW.removeClass('black-text');
		title.removeClass('black-text');
		logoTrigger.removeClass('logo-visible');
		navigationTrigger.removeClass('black-text')		
		}

		if ( sectionL.hasClass('active') ) {
			logoTrigger.addClass('no-logo');
			toparrow.addClass('white-arrow');
			rightarrow.addClass('right-arrow');
			bottomarrow.addClass('remove-arrow');
		} else {
			logoTrigger.removeClass('no-logo');
			toparrow.removeClass('white-arrow');
			rightarrow.removeClass('right-arrow');
			bottomarrow.removeClass('remove-arrow');
		}

		if ( sectionB.hasClass('active') ) {
			toparrow.addClass('white-arrow-u');
			bottomarrow.addClass('white-arrow-d');
		} else {
			toparrow.removeClass('white-arrow-u');
			bottomarrow.removeClass('white-arrow-d');
		}
        if ( $( ".vimeo" ).length ) {
		if (vimeo.hasClass('active') ) {
			player.setCurrentTime(0).then(function(seconds) {
    // seconds = the actual time that the player seeked to
}).catch(function(error) {
    switch (error.name) {
        case 'RangeError':
            // the time was less than 0 or greater than the video’s duration
            break;

        default:
            // some other error occurred
            break;
    }
});

player.setVolume(1).then(function(volume) {
    // volume was set
}).catch(function(error) {
    switch (error.name) {
        case 'RangeError':
            // the volume was less than 0 or greater than 1
            break;

        default:
            // some other error occurred
            break;
    }
});

player.play().then(function() {
    // the video was played
}).catch(function(error) {
    switch (error.name) {
        case 'PasswordError':
            // the video is password-protected and the viewer needs to enter the
            // password first
            break;

        case 'PrivacyError':
            // the video is private
            break;

        default:
            // some other error occurred
            break;
    }
});

		} else {

			player.setVolume(0).then(function(volume) {
    // volume was set
}).catch(function(error) {
    switch (error.name) {
        case 'RangeError':
            // the volume was less than 0 or greater than 1
            break;

        default:
            // some other error occurred
            break;
    }
});

player.pause().then(function() {
    // the video was played
}).catch(function(error) {
    switch (error.name) {
        case 'PasswordError':
            // the video is password-protected and the viewer needs to enter the
            // password first
            break;

        case 'PrivacyError':
            // the video is private
            break;

        default:
            // some other error occurred
            break;
    }
});

		}
    }


	}

	});
		$( ".acc-down" ).click(function() {
  			$.fn.fullpage.moveSectionDown();
		});
	}

});