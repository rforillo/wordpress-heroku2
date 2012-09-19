<?php

  get_header();

  if (have_posts()): ?>
	
  <ol id="posts">
  <?php while (have_posts()) : the_post(); ?>

    <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
			
      <h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
       <span class="comments"><?php comments_popup_link('0', '1 ', '%'); ?></span>
       <div class="clearfix"></div>
       <p class="theDate"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_time('F j, Y'); ?></a> <?php _e('by', 'grisaille'); ?> <?php the_author(); ?></p>
	
      <div class="post-wrap">
      <?php the_post_thumbnail('following-post-thumbnails'); ?>
	  <?php the_excerpt(__('keep reading', 'grisaille')); ?></div>
      <?php wp_link_pages(
      			array(	'before'           => '<p class="pages-links">' . __('Pages:', 'grisaille'),
    					'after'            => '</p>',
      					'next_or_number'   => 'number',
    					'nextpagelink'     => __('Next page', 'grisaille'),
    					'previouspagelink' => __('Previous page', 'grisaille'),
    					'pagelink'         => '%')); ?>
      <p class="postMeta"><small><?php _e('Category', 'grisaille'); ?> <?php the_category(', ') ?> | <?php _e('Tags', 'grisaille'); ?>: <?php the_tags(' '); ?></small></p>
	
      <hr class="noCss" />
    </li>

    <?php comments_template(); // Get wp-comments.php template ?>

    <?php endwhile; ?>

  </ol>

<?php else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.', 'grisaille'); ?></p>

  <?php endif; ?>


  	<div class="pagination-older"><?php next_posts_link( __('&laquo; Older Entries', 'grisaille')); ?></div>
	<div class=" pagination-newer"><?php previous_posts_link( __('Newer Entries &raquo;', 'grisaille')); ?></div> 


    



  <?php
  get_footer();
?>