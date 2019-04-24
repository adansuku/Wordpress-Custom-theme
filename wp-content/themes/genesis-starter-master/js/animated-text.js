//$(function() {
//	$('.animated-letter-h1').hover(function() {
//			$(this).addClass('animateletter-h1');
//	}, function() {
//		$(this).removeClass('animateletter-h1');
//	});
//});

$(function() {
	$('h2').hover(function() {
		$(this).find('.animated-letter-h2').addClass('animateletter-h2');
		$(this).find('.animated-letter-h2-e').addClass('animate');
	}, function() {
		$(this).find('.animated-letter-h2').removeClass('animateletter-h2');
		$(this).find('.animated-letter-h2-e').removeClass('animate');
	});
});

$('body').delay(500).queue(function(){
        $('.animated-letter-h1').addClass('animateletter-h1');
        $('.title-full').find('.animated-letter-h2-static').addClass('animateletter-h2');
});


