<?php get_header(); 
$blog['id'] = get_option('page_for_posts');
$blog['title'] = get_the_title( $blog['id'] );
$blog['permalink'] = get_the_permalink( $blog['id'] );
?>

<section class="page-hero row-outer">
  <div class="container">
    <div class="row">
			<div class="col-xl-10 col-xxl-8">
				
				<header class="entry-header text-center">
					<?php if (is_category()) { ?>
							<h6><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></h6>
							<h1 class="entry-title"><?php single_cat_title(); ?></h1>

						<?php } elseif (is_tag()) { ?>
							<h6><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></h6>
							<h1 class="entry-title"><?php single_tag_title(); ?></h1>

						<?php } elseif (is_author()) {
							global $post;
							$author_id = $post->post_author;
						?>
							<h6><?php _e( 'Posts By:', 'bonestheme' ); ?></h6>
							<h1 class="entry-title"><?php the_author_meta('display_name', $author_id); ?></h1>

						<?php } elseif (is_day()) { ?>
							<h6><?php _e( 'Daily Archives:', 'bonestheme' ); ?></h6>
							<h1 class="entry-title"><?php the_time('l, F j, Y'); ?></h1>

						<?php } elseif (is_month()) { ?>
							<h6><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></h6>
							<h1 class="entry-title"><?php the_time('F Y'); ?></h1>

						<?php } elseif (is_year()) { ?>
							<h6><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></h6>
							<h1 class="entry-title"><?php the_time('Y'); ?></h1>

					<?php } else { ?>
					<?php } ?>
								
					<div class="page-header-actions text-center">
						<div class="dropdown">
							<button class="btn btn-default btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
								Categories
							</button>

							<ul class="dropdown-menu">								
								<li><a href="<?php echo get_permalink( $blog['id'] ); ?>">All Posts</a></li>
								<?php wp_list_categories( array(
										'orderby' => 'name',
										'depth' => 1,
										'title_li' => ''
									));
								?>
							</ul><!-- /scroll_nav -->
						</div><!-- /dropdown -->

					</div> <!-- /page-header-actions -->

				</header><!-- /entry-header -->
					
    	</div> <!-- /col --> 	   
    </div> <!-- /row -->
  </div> <!-- /container -->
</section> <!-- /page-hero -->

<section class="row-outer">						
	<div class="container">	
		<div class="row justify-content-center">
			<div class="col-xl-10 col-xxl-8">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
					<?php get_template_part( 'partials/content', 'excerpt' ); ?>

				<?php endwhile; ?>
					<?php get_template_part( 'partials/pagination' ); ?>

				<?php else : ?>
					<?php get_template_part( 'partials/content', 'none' ); ?>

				<?php endif; ?>
				
			</div><!-- /col -->
		</div><!-- /row -->
	</div> <!-- /container-->
</section><!-- /row-outer -->

<?php get_footer(); ?>
