<!DOCTYPE html> 

<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class=" ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if (gt IE 7)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?> <?php if ( !wp_title('', true, 'left') ); { ?> | <?php bloginfo('description'); ?> <?php } ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

 <div id="canvas">
 <?php $options = get_option( 'grisaille_theme_options' ); ?>
 
 <div class="social-media">
		<?php if ( $options['twitterurl'] != '' ) : ?>
			<a href="<?php echo $options['twitterurl']; ?>" class="twitter"><?php _e( 'Twitter', 'grisaille' ); ?></a>
		<?php endif; ?>

		<?php if ( $options['facebookurl'] != '' ) : ?>
			<a href="<?php echo $options['facebookurl']; ?>" class="facebook"><?php _e( 'Facebook', 'grisaille' ); ?></a>
		<?php endif; ?>
		
		<?php if ( $options['googleplusurl'] != '' ) : ?>
			<a href="<?php echo $options['googleplusurl']; ?>" class="googleplus"><?php _e( 'Google +', 'grisaille' ); ?></a>
		<?php endif; ?>


		<?php if ( ! $options['hiderss'] ) : ?>
			<a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss"><?php _e( 'RSS Feed', 'grisaille' ); ?></a>
		<?php endif; ?>
	</div><!-- #social-icons-->
	

 
    <ul class="skip">
      <li><a href=".menu"><?php _e( 'Skip to navigation', 'grisaille' ); ?></a></li>
      <li><a href="#primaryContent"><?php _e( 'Skip to main content', 'grisaille' ); ?></a></li>
      <li><a href="#secondaryContent"><?php _e( 'Skip to secondary content', 'grisaille' ); ?></a></li>
      <li><a href="#footer"><?php _e( 'Skip to footer', 'grisaille' ); ?></a></li>
    </ul>

    <div id="header-wrap">
   		<div id="header">
   			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
			<div id="site-title" class="grisaille-header-image">
			<?php else: ?>
       		<div id="site-title">
       		<?php endif; ?>
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div> 
           </div>
		  
      
  	 </div> <!-- end #header-->
  <!--by default your pages will be displayed unless you specify your own menu content under Menu through the admin panel-->
	<div id="top-menu">	<?php wp_nav_menu( array('theme_location' => 'main',  'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?></div>  
	  
 </div> <!-- end #header-wrap-->

  
   <div id="primaryContent">
  