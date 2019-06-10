<div id="author-card" class="card bg-light">
	<div class="card-body">
               
		<div class="author-img">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), '96' ); ?>
		</div>

		<div class="author-description">

			<h4><?php printf( esc_attr__( 'About %s', 'brew' ), get_the_author() );?></h4>

			<p><?php echo wp_kses( get_the_author_meta( 'description' ), null ); ?></p>

			<p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="btn btn-sm btn-primary"><?php printf( esc_attr__( 'All posts by %s', 'brew' ), get_the_author() );?></a></p>

			<ul class="social-links social-links-author">
				<?php if ( get_the_author_meta( 'user_url' ) != '' )  { ?>
					<li><a class="author-icon" target="_blank" href="<?php echo esc_url( get_the_author_meta( 'user_url' ) ); ?>"><i class="fa fa-globe"></i> </a></li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'twitter' ) != '' )  { ?>
					<li><a class="author-icon" target="_blank" href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>"><i class="fa fa-twitter"></i> </a></li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'facebook' ) != '' )  { ?>
					<li><a class="author-icon" target="_blank" href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>"><i class="fa fa-facebook"></i> </a></li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'linkedin' ) != '' )  { ?>
					<li><a class="author-icon" target="_blank" href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>"><i class="fa fa-linkedin"></i> </a></li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'pinterest' ) != '' )  { ?>
					<li><a class="author-icon" target="_blank" href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>"><i class="fa fa-pinterest-square"></i> </a></li>
				<?php } ?>
			</ul><!-- /social-links-author -->

		</div><!-- /author-description -->
	</div><!-- /card-body --> 
</div><!-- /author-info.card -->