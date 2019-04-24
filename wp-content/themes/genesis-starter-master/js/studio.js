jQuery(document).ready(function($){
$('#fullpage').fullpage({

	afterLoad: function(anchorLink, index){
		var loadedSection = $(this);
var valores = $('.section'),
		sectionW = $('.white'),
		title = $('.title-full'),
		logoTrigger = $('.cd-logo-trigger'),
		navigationTrigger = $('.cd-nav-trigger');

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


	},
	onLeave: function(index, nextIndex, direction){
				var loadedSection = $(this);
var valores = $('.section'),
		sectionW = $('.white'),
		title = $('.title-full'),
		logoTrigger = $('.cd-logo-trigger'),
		navigationTrigger = $('.cd-nav-trigger');
		
		var leavingSection = $(this);

		//after leaving section 2
		if(index == 2 && direction =='down'){
			title.addClass('no-title');
		}

		else {
			title.removeClass('no-title');
		}
	}
});
});