<?php


/**
 * pr function.
 * 
 * @access public
 * @param mixed $input (default: null)
 * @param bool $exit (default: false)
 * @return void
 */
function pr($input = null, $exit = false, $classes = null){
	echo '<pre class="' . $classes . '">';
	print_r($input);
	echo '</pre>';
	if ($exit) exit;
}


/**
 * Creates a human readable list of an array
 * https://gist.github.com/SleeplessByte/4514697
 * 
 * @param string[] $ranges array to list items of
 * @param string $glue normal glue between items
 * @param string $last glue between last two items
 *
 * @remarks works with 0, 1, 2 or 3+ items
 * @returns string 'item1, item2, item3 or item4'
 */
function array_listing( $ranges, $glue = ', ', $last = ' or ') {
  array_splice( $ranges, -2, 2, implode( $last, array_slice( $ranges, -2, 2 ) ) );
  return implode( $glue , $ranges );
}





/**
 * Only show ACF menu to Admins who have toggled true/false to show it.
 */

add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {
  
    // get the current user's ID
    $user_id = get_current_user_id();
    $show_acf_menu = get_field('show_acf_menu', 'user_'. $user_id);
  
    if ( $show_acf_menu ){
      return true; // show it
    }
    else {
      return false; // hide it
    }
    
}