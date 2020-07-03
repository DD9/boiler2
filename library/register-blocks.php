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
            'mode'			        => 'preview',
            'keywords'          => array( 'testimonial', 'quote' ),
            'align'		=> 'full',
            'supports'	=> array(
              'align'		=> false,
            )
        ));
      
      
        // Team Member
        acf_register_block_type( array(
          'name'			=> 'team-member',
          'title'			=> __( 'Team Member', 'clientname' ),
          'render_template'	=> 'partials/blocks/team-member.php',
          'category'		=> 'boiler-blocks',
          'icon'			=> 'admin-users',
          'mode'			=> 'preview',
          'keywords'		=> array( 'profile', 'user', 'author' ),
          'align'		=> 'full',
          'supports'	=> array(
            'align'		=> array('full'),
          )
        ));

      
    }
}