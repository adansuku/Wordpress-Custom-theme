jQuery(document).ready(function($){
	
$('#fullpage-contact').fullpage({
	anchors:['contact', 'themap'],
		css3: true,
		scrollingSpeed: 700,
		autoScrolling: true,
		fitToSection: true,
		lazyLoading: false,

		afterLoad: function(anchorLink, index){
		var loadedSection = $(this);
		var valores = $('.section'),
		sectionW = $('.white'),
		title = $('.title-full'),
		logoTrigger = $('.cd-logo-trigger'),
		navigationTrigger = $('.cd-nav-trigger');
		sectionL = $('.map');
		bottomarrow = $('.acc-down');
		rightarrow = $('.fp-next');


		if ( sectionL.hasClass('active') ) {
			bottomarrow.addClass('remove-arrow');
		} else {
			bottomarrow.removeClass('remove-arrow');
		}


	}

});

		$( ".acc-down" ).click(function() {
  			$.fn.fullpage.moveSectionDown();
		});

});