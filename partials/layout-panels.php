
<section class="layout-panels row-outer<?php get_template_part( 'partials/style-background' ); ?>"<?php get_template_part( 'partials/style-background-image' ); ?>>

  <div class="container">
  
  	<?php get_template_part( 'partials/row-intro' ); ?>
		
		
		<?php // Panels
		if( have_rows('panels')): ?>
		<div class="row justify-content-center">
			<div class="col-xl-9">
				<?php while ( have_rows('panels') ) : the_row(); 
					$panel_title = get_sub_field('title');
					$panel_content = get_sub_field('content');
				?>
				
					<div class="toggle-panel clearfix">
						<h4 class="toggle-trigger"><span><?php if ($panel_title): ?><?= $panel_title ?><?php else: ?>Panel Title<?php endif; ?></span><div class="toggle-icon"><i class="fas fa-plus"></i><i class="fas fa-minus"></i></div></h4>
						<?php if ($panel_content) { ?>
							<div class="toggle-panel-content">
								<?= $panel_content ?>
							</div><!-- /toggle-panel-content -->
						<?php } ?>
					</div>
			
				<?php endwhile; ?>
			</div><!-- /col -->
		</div><!-- /row -->
    <?php endif; ?>
		
		<?php get_template_part( 'partials/row-footer-cta' ); ?>
    
  </div><!-- /container --> 
</section><!-- /row-outer -->