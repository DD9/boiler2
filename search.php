<?php get_header(); ?>

<div class="page-hero row-outer">
  <div class="container">
    <div class="row text-center justify-content-center">
			<div class="col-xl-9">
				<header class="entry-header">
					<h5><?php _e("Search Results for","bonestheme"); ?>: </h5>
					<h1 class="entry-title"> <?php echo esc_attr(get_search_query()); ?></h1>
				</header> 
    	</div><!-- /col -->    
    </div> <!-- /row -->
  </div> <!-- /container -->
</div> <!-- /page-hero -->

<div class="row-outer">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-xl-9">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'partials/content', 'excerpt' ); ?>

				<?php endwhile; ?>

					<?php get_template_part( 'partials/pagination' ); ?>

				<?php else : ?>

					<?php get_template_part( 'partials/content', 'none' ); ?>

				<?php endif; ?>

			</div><!-- /col -->

		</div><!-- /row -->
	</div><!-- /container -->
</div> <!-- /row-outer -->

<?php get_footer(); ?>
