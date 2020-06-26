<?php
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
?>

<div class="page-hero row-outer">
	<div class="container">
		<div class="row text-center justify-content-center">   
			<div class="col-xl-9">
				<header class="entry-header">					
					
					<?php if ( is_singular('post') ) { ?>
						<?php get_template_part( 'partials/entry-meta-single-post' ); ?>
					<?php } ?>
					
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header> 	
			</div> <!-- /col -->
		</div> <!-- /row -->
	</div> <!-- /container -->
</div> <!-- /page-hero -->


