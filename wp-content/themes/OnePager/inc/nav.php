<div class="navigation">	
	<!--Setup pagination Here-->
	
	<?php if(function_exists('wp_pagenavi'))
		  {	
			wp_pagenavi();
		  }
		  else
		  {
	?>
			<h2>wp_pagenavi is required, make sure you have installed and activated wp_pagenavi plugin.</h2>
			
	<?php } ?>
		  
</div>