<?php

// shortcodes

/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/
function wpex_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');



// Line Break Shortcode 
function line_break_shortcode() {
return '<br />';
}
add_shortcode( 'br', 'line_break_shortcode' );

// Divider shortcode
function divider_shortcode( $atts, $content = null ) {
   return '<hr />';
}
add_shortcode( 'divider', 'divider_shortcode' );

// Divider Bar shortcode
function dividerbar_shortcode( $atts, $content = null ) {
   return '<div class="divider-bar"></div>';
}
add_shortcode( 'dividerbar', 'dividerbar_shortcode' );


// Spacer shortcode 
function spacer_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'height' => ''
	), $atts ) );
	
	$output = '<div class="spacer" style="height: '. $height . 'px"></div>';
	
	return $output;
}
add_shortcode('spacer', 'spacer_shortcode'); 


// Display text shortcode 
function display_text_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'size' => '',
		'class' => ''
	), $atts ) );
	
	$output = '<h1 class="display-'. $size . ' '. $class . '">' . $content . '</h1>';
	
	return $output;
}
add_shortcode('display_text', 'display_text_shortcode'); 



// Lead text shortcode 
function lead_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );
	
	$output = '<p class="lead '. $class . '">' . $content . '</p>';
	
	return $output;
}
add_shortcode('lead', 'lead_shortcode'); 

// Small shortcode 
function small_shortcode( $atts, $content = null ) {
   return '<small>' . $content . '</small>';
}
add_shortcode( 'small', 'small_shortcode' );


// Checkmark list
function checkmark_list_shortcode( $atts, $content = null ) {
   return '<div class="checkmark-list">' . $content . '</div>';
}
add_shortcode( 'checkmark_list', 'checkmark_list_shortcode' );


// Buttons
function buttons( $atts, $content = null ) {
  extract( shortcode_atts( array(
  'class' => '', /* primary, default, info, success, danger, warning */
  'size' => '', /* sm, default, large */
  'target' => 'self', /* self, blank */
  'url'  => '' 
  ), $atts ) );
  
  $bs_btn_classes = array('primary', 'default', 'info', 'success', 'danger', 'warning' );

  if($class == "") {
    $class = "btn-default";
  }else{
    if(in_array($class, $bs_btn_classes))
      $class = "btn-" . $class;
  }

  if($size == "default" || $size == "" )
    $size = "";
  else
    $size = "btn-" . $size;

  
  $output = '<a href="' . $url . '" target="_' . $target . '" class="btn '. $class . ' ' . $size . '">';
  $output .= $content;
  $output .= '</a>';
  
  return $output;
}

add_shortcode('button', 'buttons'); 



/*
 * Columns
 * @Custom DD9, usese symple-column css since we already have that in the less files
 *
 */
if( !function_exists('column_shortcode') ) {
  function column_shortcode( $atts, $content = null ){
    extract( shortcode_atts( array(
      'size' => 'one-third',
      'position' =>'first',
      'class' => '',
      ), $atts ) );
    
    $output = "";
    
    if ($position == 'first')
      $output .= '<div class="shortcode-container clearfix">';  

    $output .= '<div class="symple-column symple-' . $size . ' symple-column-'. $position .' '. $class .'">' . do_shortcode($content) . '</div>';
    
    if ($position == 'last')
      $output .= '</div> <!-- /shortcode-container -->';
    
    return $output;
  }
  add_shortcode('column', 'column_shortcode');
}