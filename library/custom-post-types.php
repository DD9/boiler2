<?php
/**
 *  Project-Specific Custom Post Types 
 *  PostTypes (loaded via composer)
 *  https://github.com/jjgrainger/PostTypes
 */

/********************* SETUP  **************************/

// PostTypes Class
use PostTypes\PostType;

// Flush rewrite rules for custom post types
function boiler_flush_rewrite_rules() {
  flush_rewrite_rules();
} 
add_action( 'after_switch_theme', 'boiler_flush_rewrite_rules' );


/********************* DEFINE PROJECT CPT HERE **************************/

//$books = new PostType('book');

//$books->register();









/********************* CPT UTILITY FUNCTIONS **************************/

/* 
Add active/current class to CPT menu items, 
https://gist.github.com/gerbenvandijk/5253921
NOTE: this may or may not work or even be needed
*/

/*
function custom_active_item_classes($classes = array(), $menu_item = false) {
  global $post;
  // Get post ID, if nothing found set to NULL
  $id = ( isset( $post->ID ) ? get_the_ID() : NULL );
  // Checking if post ID exist...
  if (isset( $id )){
    $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );
*/