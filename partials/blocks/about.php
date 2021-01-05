<?php
/**
 * About
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
/*
// Create id attribute allowing for custom "anchor" value.
$id = 'block-basic-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-basic-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' row-outer align' . $block['align'];
}

$background_color = get_field('background_color');
$text_color = get_field('text_color');
*/

$template = array(
	array('core/heading', array(
		'level' => 2,
		'content' => 'Title Goes Here',
	)),
    array( 'core/paragraph', array(
        'content' => '<strong>Colorway:</strong> <br /><strong>Style Code:</strong>  <br /><strong>Release Date:</strong> <br /><strong>MSRP:</strong> ',
    ) )
);

echo '<div class="' . join( ' ', $classes ) . '"' . $anchor . '>';
  echo '<div class="block-about__image">';
    echo wp_get_attachment_image( get_field( 'image' ), 'medium' );
  echo '</div>';

	echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="insert" />';
	$form_id = get_option( 'options_be_release_info_form' );
	if( !empty( $form_id ) && function_exists( 'wpforms_display' ) )
		wpforms_display( $form_id, true, true );
echo '</div>';

?>
