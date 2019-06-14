<?php
/*
* Author: DD9 and Others
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' );   // needed for bootstrap navigation
require_once( 'library/utilities.php' );   // misc generic helpers
require_once( 'library/shortcodes.php' );  // shortcodes 
require_once( 'library/comment_walker.php' );     // 
require_once( 'library/comment_utilities.php' );     // 
require_once( 'vendor/autoload.php' );     // For Composer scripts

/************* SETUP DEFAULT PAGES ***************/
// require_once( 'library/site_init.php' ); // Disabled until we move it into a dedicated function


/************* OPTIONAL BOILER SCRIPTS ***************/
/*                enable as needed                   */

require_once( 'library/admin.php' ); // dashboard customizations
// require_once( 'library/custom-post-types.php' );  // project-specific CPTs



/************* INSERT THEME FUNCTIONS HERE ********************/


/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	)
);


// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false');


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


/************* THUMBNAIL SIZE OPTIONS *************/
//add_image_size( 'post-featured', 750, 300, true );


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar_blog',
		'name' => __( 'Blog Sidebar', 'bonestheme' ),
		'description' => __( 'Blog Sidebar - does not appear on mobile devices', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

// add footer widgets

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget 1', 'bonestheme' ),
    'description' => __( 'The first footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget 2', 'bonestheme' ),
    'description' => __( 'The second footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget 3', 'bonestheme' ),
    'description' => __( 'The third footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

    register_sidebar(array(
    'id' => 'footer-4',
    'name' => __( 'Footer Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));


} 
