<?php 
get_header(); 
$projects_page = get_post(30); 
$projects_page_title = $projects_page->post_title;
// get feat. img from research page	
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $projects_page ), 'large' ); 
?>

<div class="page-header-no-image">
  <div class="container">
   	<header class="entry-header">
			<div class="row">
				<div class="col-md-12">
					<h1 class="entry-title" itemprop="headline"><?= $projects_page_title ?></h1>	
				</div> <!-- /col --> 
			</div> <!-- /row -->
		
    </header> 
  </div> <!-- /container -->
</div> <!-- /page-header-no-image -->

<div class="row-outer-sm">						
	<div class="container">	
		<ul class="row card-group list-unstyled">
						
			
						<?php if (have_posts()) : while (have_posts()) : the_post();
						$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
						?>
						
						<li class="col-md-3">
							<div class="card border-primary">
							
								<div class="card-body">
										<h5><?php the_title(); ?></h5>
										<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-warning btn-bordered">View Details</a>

								</div><!-- /card-body -->

							</div>
						</li>

						<?php endwhile; ?>

						<?php else : ?>
						<?php endif; ?>

				
		</div><!-- /row -->
	</div> <!-- /container-->
</div><!-- /row-outer -->

<?php get_footer(); ?>

