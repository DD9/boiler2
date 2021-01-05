<?php
/**
 * Block Patterns
 *
 */
function boiler_register_block_patterns() {
  
  // Pattern Category
	register_block_pattern_category(
		'marketing',
		[ 'label' => __( 'Marketing Patterns', 'boiler' ) ]
	);
  
  // Cards Row
	register_block_pattern(
		'boiler/cards-row',
		[
			'title'       => __( 'Cards Row', 'boiler' ),
			'content'     => '<!-- wp:acf/cards {"id":"block_5ff4cc5a2778b","name":"acf/cards","data":{"field_5eff5ac22753c":{"5ff4cc5c2778c":{"field_5eff5b102753f":"318","field_5eff5adf2753d":"Card One Title","field_5eff5afc2753e":"Card one content lorem ipsum dolor"},"5ff4cc5d2778d":{"field_5eff5b102753f":"316","field_5eff5adf2753d":"Card Two Title","field_5eff5afc2753e":"Card two content lorem ipsum dolor"},"5ff4cc5f2778e":{"field_5eff5b102753f":"239","field_5eff5adf2753d":"Card Three Title","field_5eff5afc2753e":"Card three content lorem ipsum dolor"}},"field_5eff659547f06":"#1e73be","field_5eff65e337fdf":""},"align":"full","mode":"auto"} /-->',
			'description' => _x( 'Row with three cards', 'Block pattern description', 'boiler' ),
			'categories'  => [ 'marketing' ],
			'keywords'    => [ 'cards' ]
		]
	);

}
add_action( 'init', 'boiler_register_block_patterns' );
