<?php

add_action( 'admin_init', 'grisaille_options_init' );
add_action( 'admin_menu', 'grisaille_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function grisaille_options_init(){
	register_setting( 'grisaille_options', 'grisaille_theme_options', 'grisaille_options_validate' );
}

/**
 * Load up the menu page
 */
function grisaille_options_add_page() {
	add_theme_page( __( 'Theme Options', 'grisaille' ), __( 'Theme Options', 'grisaille' ), 'edit_theme_options', 'theme_options', 'grisaille_options_do_page' );
}

/**
 * Create the options page
 */
function grisaille_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'grisaille' ) . "</h2>"; ?>
		<p><?php _e( 'These options will let you setup the social icons at the top of the theme. You can enter the URLs of your profiles to have the icons show up.', 'grisaille' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'grisaille' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'grisaille_options' ); ?>
			<?php $options = get_option( 'grisaille_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * RSS Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Hide RSS Icon?', 'grisaille' ); ?></th>
					<td>
						<input id="grisaille_theme_options[hiderss]" name="grisaille_theme_options[hiderss]" type="checkbox" value="1" <?php checked( '1', $options['hiderss'] ); ?> />
						<label class="description" for="grisaille_theme_options[hiderss]"><?php _e( 'Hide the RSS feed icon?', 'grisaille' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Facebook URL', 'grisaille' ); ?></th>
					<td>
						<input id="grisaille_theme_options[facebookurl]" class="regular-text" type="text" name="grisaille_theme_options[facebookurl]" value="<?php esc_attr_e( $options['facebookurl'] ); ?>" />
						<label class="description" for="grisaille_theme_options[facebookurl]"><?php _e( 'Leave blank to hide Facebook Icon', 'grisaille' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Twitter URL', 'grisaille' ); ?></th>
					<td>
						<input id="grisaille_theme_options[twitterurl]" class="regular-text" type="text" name="grisaille_theme_options[twitterurl]" value="<?php esc_attr_e( $options['twitterurl'] ); ?>" />
						<label class="description" for="grisaille_theme_options[twitterurl]"><?php _e( 'Leave blank to hide Twitter Icon', 'grisaille' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Google +
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Enter your Google + URL', 'grisaille' ); ?></th>
					<td>
						<input id="grisaille_theme_options[googleplusurl]" class="regular-text" type="text" name="grisaille_theme_options[googleplusurl]" value="<?php esc_attr_e( $options['googleplusurl'] ); ?>" />
						<label class="description" for="grisaille_theme_options[googleplusurl]"><?php _e( 'Leave blank to hide Google + Icon', 'grisaille' ); ?></label>
					</td>
				</tr>
				
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'grisaille' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function grisaille_options_validate( $input ) {

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hiderss'] ) )
		$input['hiderss'] = null;
		$input['hiderss'] = ( $input['hiderss'] == 1 ? 1 : 0 );

	// Our text option must be safe text with no HTML tags
	$input['twitterurl'] = wp_filter_nohtml_kses( $input['twitterurl'] );
	$input['facebookurl'] = wp_filter_nohtml_kses( $input['facebookurl'] );
	$input['googleplusurl'] = wp_filter_nohtml_kses( $input['googleplusurl'] );
	
	// Encode URLs
	$input['twitterurl'] = esc_url_raw( $input['twitterurl'] );
	$input['facebookurl'] = esc_url_raw( $input['facebookurl'] );
	$input['googleplusurl'] = esc_url_raw( $input['googleplusurl'] );
	
	return $input;
}