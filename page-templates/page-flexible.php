<?php
/*
Template Name: Flexible Page 
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/page-header' ); ?>


<?php // Start flexible content rows 
if( have_rows('content_rows') ): while ( have_rows('content_rows') ) : the_row();
?>
	
	<?php // Basic Cards ?>
	<?php if( get_row_layout() == 'basic_cards' ): ?>

    <?php get_template_part( 'partials/layout', 'basic-cards' ); ?>

	<?php // Single Column Content ?>
	<?php elseif( get_row_layout() == 'single_column' ): ?>

    <?php get_template_part( 'partials/layout', 'single-column' ); ?>

	<?php else: // Else nothing?>
	<?php endif; // End check for layouts ?>

<?php endwhile; // Endwhile content_rows ?>
<?php else : ?>
	
<?php endif;  // Endif content_rows?>


<?php get_footer(); ?>
