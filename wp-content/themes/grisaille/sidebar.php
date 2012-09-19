<div class="wrap">

	<?php if ( is_active_sidebar( 'grisaillesidebar' ) ) : ?>

		<?php dynamic_sidebar( 'grisaillesidebar' ); ?>

	<?php else : ?>

 <div class="sidebaritem"> 
     <h3><?php _e('Bookmarks', 'grisaille'); ?></h3>
        <ul>
          <?php  
          /**
          * only shown if widget sidebar not enabled
          */
          wp_list_bookmarks('title_li=& categorize=0&title_before=&title_after='); ?>
         </ul> 
        </div>
    <div class="sidebaritem"> 
     <h3><?php _e('Categories', 'grisaille'); ?></h3>
     	<ul>
		<?php wp_list_categories('title_li='); ?>
        </ul>
 </div>
   
<div id="search" class="sidebaritem">
     <label for="s"><?php _e('Search:', 'grisaille'); ?></label>
      <form id="searchform" method="get" action="<?php echo home_url(); ?>">
	    <div>
		    <input type="text" name="s" id="s" size="15" />
		    <input id="searchBtn" type="submit" value="<?php _e('Search', 'grisaille'); ?>" />
	    </div>
	    </form>
    </div>

<div id="archives" class="sidebaritem">
		<h3><?php _e('Archives:', 'grisaille'); ?></h3>
	    <ul><?php wp_get_archives('type=monthly'); ?></ul>
    </div>

   <div id="meta"  class="sidebaritem">
   <h3><?php _e('Meta:', 'grisaille'); ?></h3>
	  <ul>
		  <?php wp_register(); ?>
		  <li><?php wp_loginout(); ?></li>
		  <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS', 'grisaille'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		  <li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS', 'grisaille'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>', 'grisaille'); ?></a></li>
	
		  <?php wp_meta(); ?>
	  </ul>
   </div>
<?php endif; ?>

</div>