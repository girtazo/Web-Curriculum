jQuery(document).ready(function() {
	
	jQuery('#cb_portfolio_upload_images').click(function() {
		
	    var tbURL = jQuery('#add_image').attr('href');
	    
	    if(typeof tbURL === 'undefined') {
	        tbURL = jQuery('#content-add_media').attr('href');
	    }
	    
		tb_show('', tbURL);
		return false;
		
	});
	//upload button for client widget
	jQuery('.client-image-upload').click(function() {
		var button = jQuery(this);	
		window.send_to_editor = function(html) 		
		{
			imgurl = jQuery('img',html).attr('src');
			//jQuery('#cb_image').val(imgurl);
			button.parent().find('.client-image').val(imgurl);
			
			tb_remove();
		}	 
	 
		tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true');
		return false;
			
		});
	/*jQuery('#cb_image_button').click(function() {
		
		window.send_to_editor = function(html) 
		
		{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#cb_image').val(imgurl);
			tb_remove();
		}
	 
	 
		tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true');
		return false;
		
	});*/
 
});
