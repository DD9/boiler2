<?php get_header(); ?>

<?php get_template_part( 'partials/page-header' ); ?>

<section class="row-outer overflow-hidden">						
	<div class="container">	
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
					<?php get_template_part( 'partials/content'); ?>

				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'partials/content', 'none' ); ?>

				<?php endif; ?>
				
			</div><!-- /col -->
			
			
			<?php /*?><?php get_sidebar(); ?><?php */?>
			
			
		</div><!-- /row -->
	</div> <!-- /container-->
</section><!-- /row-outer -->

	
<?php get_footer(); ?>
