<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<?php if ($image) : ?>
		<section class="entry-featured-img">
			<img src="<?php echo $image[0]; ?>" />
		</section>
	<?php else: ?>
  <?php endif; ?>

	<section class="entry-content clearfix">

		<?php the_content(); ?>
		
		<?php wp_link_pages(
			array(
				'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
				'after' => '</div>'
			) 
		); ?>
	</section> 

	<footer class="article-footer single-footer clearfix">
		<span class="tags"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fas fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
	</footer>

</article>

<?php get_template_part( 'partials/author-info' ); ?>


<?php if ( is_single() ) {?>
	<div id="single-post-nav">
		<ul class="pager clearfix">

			<?php $trunc_limit = 22; ?>

			<?php if( '' != get_next_post() ){ ?>
				<li class="previous">
					<?php next_post_link( '<span class="previous-page">%link</span>', __( '<i class="fas fa-caret-left"></i>', 'bones' ) . '&nbsp;' . brew_truncate_text( get_next_post()->post_title, $trunc_limit ) ); ?>
				</li>
			<?php } // end if ?>

			<?php if( '' != get_previous_post() ) { ?>
				<li class="next">
					<?php previous_post_link( '<span class="no-previous-page-link next-page">%link</span>', '&nbsp;' . brew_truncate_text( get_previous_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fas fa-caret-right"></i>', 'bones' ) ); ?>
				</li>
			<?php } // end if ?>

		</ul>
	</div><!-- /#single-post-nav -->
<?php } ?>


<?php comments_template(); ?>

