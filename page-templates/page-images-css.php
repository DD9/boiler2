<?php
/*
Template Name: Responsive Images - CSS 
*/
get_header(); the_post(); 
?>

<?php get_template_part( 'partials/page-header' ); ?>


<?php if ( !empty( get_the_content() ) ){ ?>
<section class="row-outer">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-xl-9">

				<?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<?php the_content(); ?>
				</article> 
			
			</div> <!-- /col -->

		</div> <!-- /row -->
	</div> <!-- /container -->
</section> <!-- /row-outer -->
<?php } ?>

<?php get_footer(); ?>
