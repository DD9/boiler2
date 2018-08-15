<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<?php /*?><?php if ($image) : ?>
		<section class="entry-image bg-image" style="background-image: url('<?php echo $image[0]; ?>')">
		</section>
	<?php else: ?>
		<hr />
	<?php endif; ?><?php */?>
	
			
	<header class="entry-header">
		<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>

		<p class="entry-meta byline vcard">
			<span class="entry-date"><?php echo get_the_time( 'm.d.Y') ?></span><!-- /entry-date -->
			by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span>
		</p>
	</header> 
	
	<?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?>
	

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
		<span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
	</footer>

</article>

<?php get_template_part( 'partials/author-info' ); ?>


<?php if ( is_single() ) {?>
	<div id="single-post-nav">
		<ul class="pager clearfix">

			<?php $trunc_limit = 22; ?>

			<?php if( '' != get_previous_post() ) { ?>
				<li class="previous">
					<?php previous_post_link( '<span class="previous-page">%link</span>', __( '<i class="fa fa-caret-left"></i>', 'bones' ) . '&nbsp;' . brew_truncate_text( get_previous_post()->post_title, $trunc_limit ) ); ?>
				</li>
			<?php } // end if ?>

			<?php if( '' != get_next_post() ) { ?>
				<li class="next">
					<?php next_post_link( '<span class="no-previous-page-link next-page">%link</span>', '&nbsp;' . brew_truncate_text( get_next_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fa fa-caret-right"></i>', 'bones' ) ); ?>
				</li>
			<?php } // end if ?>

		</ul>
	</div><!-- /#single-post-nav -->
<?php } ?>

<?php comments_template(); ?>

