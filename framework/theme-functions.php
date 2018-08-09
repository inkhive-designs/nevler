<?php
/*
 * @package nevler, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/logo_compatibility.php';

/*
** Walkers for Navigation menus
*/ 


/*
 * Pagination Function. Implements core paginate_links function.
 */
function nevler_pagination() {
	the_posts_pagination( array( 'mid_size' => 2 ) );
}


/*
 * Function to Trim Excerpt Length & more..
 */
function nevler_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'nevler_excerpt_length', 999 );

function nevler_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'nevler_excerpt_more' );
  
/*
** Function to check if Sidebar is enabled on Current Page 
*/

function nevler_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('nevler_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('nevler_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('nevler_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function nevler_primary_class() {
	$sw = esc_html( get_theme_mod('nevler_sidebar_width',4) );
	$class = "col-md-".(12-$sw);
	
	if ( !nevler_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('nevler_primary-width', 'nevler_primary_class');

function nevler_secondary_class() {
	$sw = esc_html( get_theme_mod('nevler_sidebar_width',4) );
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('nevler_secondary-width', 'nevler_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function nevler_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function nevler_fade($color, $val) {
	return "rgba(".nevler_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function nevler_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('nevler_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('nevler_blog_layout') );
	else :
		get_template_part( $ldir ,'nevler');	
	endif;	
}
add_action('nevler_blog_layout', 'nevler_get_blog_layout');



/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


