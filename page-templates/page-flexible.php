<?php
/*
Template Name: Flexible Page
*/
get_header(); the_post(); 
?>


<?php get_template_part( 'partials/page-header' ); ?>


<?php // Start flexible content rows 
if( have_rows('content_rows') ): while ( have_rows('content_rows') ) : the_row();
?>


	<?php // Basic Content ?>
	<?php if( get_row_layout() == 'basic_content' ): ?>
    <?php get_template_part( 'partials/layout', 'content-basic' ); ?>


  <?php // Basic Cards ?>
	<?php elseif( get_row_layout() == 'basic_cards' ): ?>
    <?php get_template_part( 'partials/layout', 'cards-basic' ); ?>


  <?php // Image/Text Row ?>
	<?php elseif( get_row_layout() == 'image_text_row' ): ?>
    <?php get_template_part( 'partials/layout', 'image-text-row' ); ?>

	<?php // Panels ?>
	<?php elseif( get_row_layout() == 'toggle_panels' ): ?>
    <?php get_template_part( 'partials/layout', 'panels' ); ?>


	<?php else: // Else nothing?>
	<?php endif; // End check for layouts ?>

<?php endwhile; // Endwhile content_rows ?>
<?php else : ?>
	
<?php endif;  // Endif content_rows?>


<?php get_footer(); ?>
