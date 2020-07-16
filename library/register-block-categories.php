<?php
/**
 * Block category for "Boiler Blocks" if it doesn't exist already.
 *
 * @param array $categories Array of block categories.
 *
 * @return array
 */
function boiler_block_categories( $categories ) {
    $category_slugs = wp_list_pluck( $categories, 'slug' );
    return in_array( 'boiler-blocks', $category_slugs, true ) ? $categories : array_merge(
        $categories,
        array(
            array(
                'slug'  => 'boiler-blocks',
                'title' => __( 'Boiler Blocks', 'boiler-blocks' ),
                'icon'  => null,
            ),
        )
    );
}
add_filter( 'block_categories', 'boiler_block_categories' );
