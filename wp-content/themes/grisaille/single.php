<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>

    <div id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>

      <h1 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
       <span class="comments"><?php comments_popup_link('0', '1 ', '%'); ?></span>
     		 <div class="clearfix"></div>
           <p class="theDate"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_time('F j, Y'); ?></a> <?php _e('by','grisaille'); ?> <?php the_author(); ?></p>

    <div class="post-wrap">
	<?php the_post_thumbnail(); ?>
	<?php the_content(); ?></div>
	<?php wp_link_pages(
      			  array(	'before'           => '<p class="pages-links">' . __('Pages:', 'grisaille'),
    						'after'            => '</p>',
      						'next_or_number'   => 'number',
    						'nextpagelink'     => __('Next page', 'grisaille'),
    						'previouspagelink' => __('Previous page', 'grisaille'),
    						'pagelink'         => '%')); ?>
	  <p class="postMeta"><small><?php _e('Category','grisaille'); ?> <?php the_category(', ') ?> | <?php _e('Tags', 'grisaille'); ?>: <?php the_tags(' '); ?></small></p>
      <hr class="noCss" />

    </div>
    <div class="post-link">		
 		<div class="pagination-newer"><?php next_post_link('%link &raquo;'); ?></div>
		<div class=" pagination-older"><?php previous_post_link('&laquo; %link'); ?></div> 
	</div>
	<?php

  comments_template();

  endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php
  endif;

  get_footer();

?>