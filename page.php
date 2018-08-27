<?php get_header(); the_post(); ?>

<div id="page-header-outer" class="row-outer">
  <div class="container">
    <div class="row">
			<div class="col-md-12">
				<header class="entry-header text-center">
					<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
				</header> 
			</div> <!-- /col -->
    </div> <!-- /row -->
  </div> <!-- /container -->
</div> <!-- /page-header-outer -->

<div id="page-content-outer" class="row-outer">
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
</div> <!-- /page-content-outer -->



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
