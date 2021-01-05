<?php
/**
 * ACF blocks
 *
 */
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Testimonial
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'partials/blocks/testimonial.php',
            'category'          => 'boiler-blocks',
            'icon'              => 'admin-comments',
            'mode'			        => 'auto',
            'keywords'          => array( 'testimonial', 'quote' ),
            'align'		=> 'full',
            'supports'	=> array(
              'align'		=> false,
            )
        ));
      
      
        // Cards
        acf_register_block_type( array(
          'name'			=> 'cards',
          'title'			=> __( 'Cards'),
          'render_template'	=> 'partials/blocks/cards.php',
          'category'		=> 'boiler-blocks',
          'mode'			=> 'auto',
          'keywords'		=> array( 'cards', 'columns', 'row' ),
          'align'		=> 'full',
          'supports'	=> array(
            'align'		=> array('full'),
          )
        ));
      
        // About
        /*
        acf_register_block_type( array(
          'title'			=> __( 'About', 'client_textdomain' ),
          'name'			=> 'about',
          'render_template'	=> 'partials/blocks/about.php',
          'category'		=> 'boiler-blocks',
          'mode'			=> 'preview',
          'supports'		=> [
            'align'			=> false,
            'anchor'		=> true,
            'customClassName'	=> true,
            'jsx' 			=> true,
          ]
        ));
        */
      
    }
}