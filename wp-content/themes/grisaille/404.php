<?php get_header(); ?>

<div id="content" class="error-page">
 <h2><span><?php _e('Error 404','grisaille'); ?></span></h2>
 <p><strong><?php _e('Sorry, what you are looking for doesn\'t seem to be here.', 'grisaille'); ?></strong><br />
</p>
<dl>
	<dt><?php _e('You can try:','grisaille'); ?></dt>
    	<dd> <?php _e('Going','grisaille'); ?> <a href="<?php echo home_url(); ?>"><?php _e('home', 'grisaille'); ?></a> 
 		 <?php _e('or doing a Search.', 'grisaille'); ?></dd>
 </dl>

	<?php get_search_form(); ?> 
 
    
 
</div> <!-- end #content -->


<?php get_footer(); ?>