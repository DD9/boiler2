<?php get_header(); 
$blog['id'] = get_option('page_for_posts');
$blog['title'] = get_the_title( $blog['id'] );
$blog['permalink'] = get_the_permalink( $blog['id'] );
?>


<div id="page-hero" class="row-outer">
  <div class="container">
    <div class="row">
			<div class="col-md-12">
				<header class="entry-header text-center">
					<h1 class="entry-title" itemprop="headline"><a href="<?= $blog['permalink']?>"><?= $blog['title']; ?></a></h1>
				</header> 
			</div> <!-- /col -->
    </div> <!-- /row -->
  </div> <!-- /container -->
</div> <!-- /page-hero -->


<div id="page-content-outer"  class="row-outer">						
	<div class="container">	
		<div class="row justify-content-center">
			<div class="col-md-9">
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
</div><!-- /row-outer -->

	
<?php get_footer(); ?>
