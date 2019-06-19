<?php
$blog['id'] = get_option('page_for_posts');
$blog['title'] = get_the_title( $blog['id'] );
$blog['permalink'] = get_the_permalink( $blog['id'] );
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<ul class="breadcrumb justify-content-center entry-meta">
		<li class="breadcrumb-item"><a href="<?= $blog['permalink'] ?>"><?= $blog['title'] ?></a></li> 
		<li class="byline vcard"><?php echo get_the_time( 'm.d.Y') ?></li>
		<li class="byline vcard"><?php echo bones_get_the_author_posts_link() ?></li>
	</ul>
<?php endwhile; endif; ?>