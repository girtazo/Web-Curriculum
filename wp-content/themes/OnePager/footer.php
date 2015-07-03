<!--grid_12 start here-->
<div class="grid_12">
    <!--footer start here-->
    <div id="footer">       
	   <div class="grid_3">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area One') ) : ?>	
			<h1>Search</h1>			
			<div class="widget">
				<?php get_search_form(); ?>
			</div>
			<?php endif; ?>           
	   </div>
        <!--grid_3 start here-->
        <div class="grid_3">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area Two') ) : ?>
			<?php endif; ?>           
        </div>       
        <div class="grid_3">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Area Three') ) : ?>
			<?php endif; ?>          
        </div>
        <!--grid_3 end here-->
        <!--grid_3 start here-->
        <div class="grid_3">
		    <h1>
                Contact
            </h1>            
            <p >
                Reach us at <a href="#"><?php echo of_get_option('cb_home_email');?></a><br />
                Call now <?php echo of_get_option('cb_home_telephone');?>
            </p>
        </div>
        <!--grid_3 end here-->
    </div>
    <!--footer end here-->
</div>
<div class="grid_12">	
    <div class="copyright">
        &copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'primary','container_class'=> 'footer-nav' ) ); ?>
</div>
<!--grid_12 start here-->
<div class="clear">
</div>
</div>
<!--container_12 end here-->
<?php wp_footer(); ?>
<!-- Don't forget analytics -->
</body>
</html>