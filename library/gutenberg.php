<?php
/**
 * Disable Editor
 *
 * @package      ClientName
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'page-templates/page-flexible.php'
	);

	$excluded_ids = array(
		// get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );




/**
 * Only enable specific Gutenberg blocks
 * https://rudrastyh.com/gutenberg/remove-default-blocks.html
 */

add_filter( 'allowed_block_types', 'boiler_allowed_block_types' );
 
function boiler_allowed_block_types( $allowed_blocks ) {
 
	return array(
		// Common Blocks
		'core/paragraph',
    'core/image',
		'core/heading',
    'core/gallery',
		'core/list',
    'core/quote',
    'core/cover',
    'core/file',
    'core/video',
    
    //Formatting
    'core/table',
		'core/code',
    'core/freeform',
		'core/html',
    'core/preformatted',
    'core/pullquote',
    
    //Layout
    'core/text-columns',
    'core/media-text',
		'core/separator',
    'core/spacer',
    
    // Widgets
		'core/shortcode',
    
    // Embeds
		'core/embed',
    'core-embed/twitter',
		'core-embed/youtube',
    'core-embed/facebook',
		'core-embed/instagram',
    'core-embed/vimeo'
	);
 
}

