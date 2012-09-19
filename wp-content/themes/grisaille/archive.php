<?php get_header(); ?>


 <?php is_tag(); ?>
  <?php if (have_posts()) : ?>

  <div id="archives"> 
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','grisaille'); ?></h2>
   <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2><?php _e('Posts Tagged', 'grisaille'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
   <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2><?php the_date('F j, Y'); ?></h2>
   <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2> <?php the_date('F, Y'); ?></h2>
   <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2><?php the_date('Y'); ?></h2>
   <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2><?php _e('Author Archive', 'grisaille'); ?></h2>
   <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2><?php _e('Blog Archives', 'grisaille'); ?></h2>
   <?php } ?>
   </div>
 <ol id="posts">
  <?php while (have_posts()) : the_post(); ?>

    <li id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>

       <h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
     	 <span class="comments"><?php comments_popup_link('0', '1 ', '%'); ?></span>
      <div class="clearfix"></div>
      <p class="theDate"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_time('F j, Y'); ?></a> <?php _e('by','grisaille'); ?> <?php the_author(); ?></p>
	
      <div class="post-wrap">
      <?php the_post_thumbnail('following-post-thumbnails'); ?>

	  <?php the_excerpt(__('keep reading','grisaille')); ?></div>
      <p class="postMeta"><small><?php _e('Category','grisaille'); ?> <?php the_category(', ') ?> | <?php _e('Tags','grisaille'); ?>: <?php the_tags(' '); ?></small></p>

      <hr class="noCss" />
    </li>

    <?php comments_template(); // Get wp-comments.php template ?>

    <?php endwhile; ?>

  </ol>

 
 <?php else : ?>

  <p><?php _e('Sorry, no posts matched your criteria.','grisaille'); ?></p>

  <?php endif; ?>


  	<div class="pagination-older"><?php next_posts_link( __('&laquo; Older Entries', 'grisaille')); ?></div>
	<div class=" pagination-newer"><?php previous_posts_link( __('Newer Entries &raquo;', 'grisaille')); ?></div> 
    


<?php get_footer(); ?>