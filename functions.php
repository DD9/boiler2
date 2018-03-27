<?php
/*
* Author: DD9 and Others
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' );   // needed for bootstrap navigation
require_once( 'library/utilities.php' );   // misc generic helpers
require_once( 'library/shortcodes.php' );  // shortcodes 
require_once( 'vendor/autoload.php' );     // For Composer scripts


/************* SETUP DEFAULT PAGES ***************/

// require_once( 'library/site_init.php' ); // Disabled until we move it into a dedicated function


/************* OPTIONAL BOILER SCRIPTS ***************/
/*                enable as needed                   */

require_once( 'library/admin.php' ); // dashboard customizations
// require_once( 'library/custom-post-types.php' );  // project-specific CPTs



/************* INSERT THEME FUNCTIONS HERE ********************/






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
  - navwalker
  - Read more > Bootstrap button
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
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); 




/************* THUMBNAIL SIZE OPTIONS *************/


//add_image_size( 'bones-thumb-600', 600, 150, true );
//add_image_size( 'bones-thumb-300', 300, 100, true );
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
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'sidebar_blog_mobile',
		'name' => __( 'Blog Sidebar(mobile)', 'bonestheme' ),
		'description' => __( 'Blog Sidebar - only appears on mobile devices', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));


// add footer widgets

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget 1', 'bonestheme' ),
    'description' => __( 'The first footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget 2', 'bonestheme' ),
    'description' => __( 'The second footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget 3', 'bonestheme' ),
    'description' => __( 'The third footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

    register_sidebar(array(
    'id' => 'footer-4',
    'name' => __( 'Footer Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));


} 





/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
			<div class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="64" width="64" src="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
				<?php // end custom gravatar call ?>
			</div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s |</cite>', 'bonestheme' ), get_comment_author_link()) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
  			<?php if ($comment->comment_approved == '0') : ?>
  				<div class="alert alert-info">
  					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
  				</div>
  			<?php endif; ?>
  			<section class="comment_content clearfix">
  				<?php comment_text() ?>
  			</section>
  			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


