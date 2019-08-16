<?php
/*
Template Name: Flexible Page 
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/page-header' ); ?>


<?php if ( !empty( get_the_content() ) ){ ?>
<section class="row-outer overflow-hidden">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-md-9">

				<?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<?php the_content(); ?>
				</article> 
			
			</div> <!-- /col -->

		</div> <!-- /row -->
	</div> <!-- /container -->
</section> <!-- /row-outer -->
<?php } ?>


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
