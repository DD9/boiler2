<?php
/*
* Author: DD9 and Others
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' );			   // Needed for bootstrap navigation
require_once( 'library/utilities.php' );   			 // Misc generic helpers
require_once( 'library/shortcodes.php' );  			 // Shortcodes 
require_once( 'library/register-sidebars.php' ); // Register Sidebars
require_once( 'library/comment-walker.php' );    // Comments walker (from WP twentynineteen theme)
require_once( 'library/comment-utilities.php' ); // Comments utilities (from WP twentynineteen theme)
require_once( 'vendor/autoload.php' );  				 // For Composer scripts
//require_once( 'library/custom-image-sizes.php' ); // Add custom image sizes

/************* SETUP DEFAULT PAGES ***************/
// require_once( 'library/site-init.php' ); // Disabled until we move it into a dedicated function


/************* OPTIONAL BOILER SCRIPTS ***************/
/*                enable as needed                   */

require_once( 'library/admin.php' ); // dashboard customizations
// require_once( 'library/custom-post-types.php' );  // project-specific CPTs



/************* INSERT THEME FUNCTIONS HERE ********************/


// Add Editor Stylesheet
function my_theme_add_editor_styles() {
    add_editor_style( '/css/editor-styles.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );



/************* BREW & BOILER FILES ********************/

$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
define('PROTOCOL', $protocol); // are we in http / https 
define('TMPL_URL', rtrim( get_template_directory_uri() , '/' )); // full URL, NO trailing slash
define('TMPL_DIR', rtrim( get_template_directory() , '/' ) ); // full directory all the way to root, NO trailing slash



function boiler_dependencies() {
  if( ! function_exists('acf_add_options_page') )
    echo '<div class="error"><p> Warning: The theme needs ACF Plugin installed and activated to function </p></div>';
}
add_action( 'admin_notices', 'boiler_dependencies' );

//http://www.advancedcustomfields.com/resources/features/options-page/
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}



/* library/brew.php (functions specific to BREW)
  - Bootstrap style pagination
  - Bootstrap style breadcrumbs
*/
require_once( 'library/brew.php' ); 

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- removing <p> from around images
	- customizing the post excerpt
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); 
