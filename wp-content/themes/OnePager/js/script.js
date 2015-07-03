// JavaScript Document
jQuery(document).ready(function()
{
	///////////////////////////////////////////////////////////////////////////////////// 
    var images = jQuery('.quake-slider-images img').length;
    var w = (images * 50) + 10;

    jQuery('#slider').quake({
        thumbnails: false,
        animationSpeed: 500,
		pauseTime:5000,
        applyEffectsRandomly: false,
        navPlacement: 'inside',
        navAlwaysVisible: true,
        hasNextPrev: false,
        captionOpacity: '0.3',
        captionsSetup: [
                                 {
                                     "orientation": "top",
                                     "slides": [0, 1, 2, 3, 4],
                                     "callback": captionAnimateCallback
                                 }
                                ]
    });

    function captionAnimateCallback(captionWrapper, captionContainer, orientation) {
        captionWrapper.css({ left: '-940px' }).stop(true, true).animate({ left: 0 }, 500);
        captionContainer.css({ left: '-940px' }).stop(true, true).animate({ left: 0 }, 500);
    }

    jQuery(window).load(function () {
        jQuery('.quake-nav-container').css({ width: w })
    });

	////////////////////////////////////////////////////////////////////////////////////

	iconshover();
	imagehover();
	masonry();
	navigation();
	lightbox();

});


//----------
// icons hover
//----------
function iconshover(){
	jQuery(".equal_columns").hover(function(){
		jQuery(this).find("img").animate({right: "25px"}, "fast");
		}, function() {
		jQuery(this).find("img").animate({right: "10px"}, "fast");
	});
}

//----------
// image hover
//----------
function imagehover(){
	
	jQuery(".gallery_item, .wrap_image ").hover(function() {
				jQuery(this).find("img").animate({opacity: 0.7}, "slow");
				jQuery(this).find(".over_image").animate({opacity: "show", top: "50%"}, "slow","easeOutExpo");
			}, function() {
				jQuery(this).find("img").animate({opacity: 1}, "fast");
				jQuery(this).find(".over_image").animate({opacity: "hide", top: "-60"}, "fast");
			});
}


//----------
// masonry and filter
//----------
function masonry(){
	;
	
	var speed = 500,  // animation speed
    wall = jQuery('#main').find('.wrap_page');

	wall.masonry({
	  // only apply masonry layout to visible elements
	  itemSelector: '.portfolio_box:not(.invis)',
	  animate: true,
	  animationOptions: {
		duration: speed,
		queue: false
	  }
	});


jQuery('#filtering-nav a').click(function(){
  var colorClass = '.' + jQuery(this).attr('class');

  if(colorClass=='.all') {
    // show all hidden boxes
    wall.children('.invis')
      .toggleClass('invis').fadeIn(speed);
  } else {  
    // hide visible boxes 
    wall.children().not(colorClass).not('.invis')
      .toggleClass('invis').fadeOut(speed);
    // show hidden boxes
    wall.children(colorClass+'.invis')
      .toggleClass('invis').fadeIn(speed);
  }
  wall.masonry();

  return false;
});

}


//----------
// main navigation
//----------
function navigation(){
		  
	jQuery("#nav a").removeAttr('title');
	jQuery("#nav ul").css({display: "none"});
		jQuery(" #nav li").hover(function(){									 
			jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400,"easeInOutQuart");},
			function(){
			jQuery(this).find('ul:first').css({visibility: "hidden"});
	});
		
}




//----------
// fancybox lightbox
//----------
function lightbox(){
	
	jQuery("a[rel=fancyzoom]").fancybox();
	
	jQuery("a[rel=fancyzoom_group]").fancybox();
	
	//----------
	// fancybox vimeo 
	//----------
	jQuery("a[rel=fancyvimeo]").click(function() {
		jQuery.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'title'			: this.title,			
				'href'			: this.href.replace(new RegExp("[0-9]", "i"), 'moogaloop.swf?clip_id=1'),
				'type'			: 'swf',
				'swf'			: {'wmode':'transparent','allowfullscreen':'true'}
		});

	return false;
	});	
	
	//----------
	// fancybox youtube 
	//----------
	jQuery("a[rel=fancytube]").click(function() {
		jQuery.fancybox({
				'padding'             : 0,
				'autoScale'   : false,
				'transitionIn'        : 'none',
				'transitionOut'       : 'none',
				'title'               : this.title,
				'width'               : 680,
				'height'              : 495,
				'href'                : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'                : 'swf',    // <--add a comma here
				'swf'                 : {'allowfullscreen':'true', 'wmode':'opaque'} // <-- flashvars here
		}); 

	return false;
	});	
	
}


