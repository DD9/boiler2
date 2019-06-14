<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-excerpt-row'); ?> role="article">
	<div class="row">

		<div class="col-md-6">
			<section class="excerpt-img bg-img" style="background-image: url('<?php if ($image) : ?><?php echo $image[0]; ?><?php else: ?><?= get_bloginfo('template_directory'); ?>/images/default_thumbnail.jpg<?php endif; ?>')">
				<a href="<?php the_permalink() ?>" class="full-width"></a>
			</section>
		</div><!-- /col -->

		<div class="col-md-6">
			<header class="entry-excerpt-header">
				<h3 class="entry-excerpt-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			</header>

			<section class="entry-excerpt clearfix">
				<?php the_excerpt(); ?>
			</section>
			
			<?php if ( (has_category()) || (has_tag()) ) {?>
			<footer class="article-footer excerpt-footer clearfix">
				<span><?php the_time('m/d/y') ?> | </span>
				<span class="tags"><?php printf( '<span class="">' . __( '%1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
			</footer> <?php // end article footer ?>
			<?php } ?>
			
		</div><!-- /col -->

	</div><!-- /row -->
</article>