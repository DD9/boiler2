<?php
$column_ratio = get_sub_field('column_ratio');
$columns = get_sub_field('columns');
if ($columns) {
	$col_count = count( $columns );
}
?>
<section class="layout-basic-content row-outer row-aos<?php get_template_part( 'partials/style-background' ); ?><?php get_template_part( 'partials/style-text' ); ?>"<?php get_template_part( 'partials/style-background-image' ); ?>>
  
	<div class="container">
		
		<?php get_template_part( 'partials/row-intro' ); ?>
  
		<?php // Columns
		if( have_rows('columns')): $number = 0; ?>
		
		<div class="row<?php if ($column_ratio == 'fifty_fifty' && $col_count==2 ): ?> justify-content-between<?php else: ?> justify-content-center<?php endif; ?>">	
			
			<?php while ( have_rows('columns') ) : the_row(); 
				$column_content = get_sub_field('column_content');
				$number++;
			?>
			
			<div class="<?php if($col_count==1): ?>col-xl-9
                  <?php elseif ($column_ratio == 'thirty_seventy' && $number==1 ): ?>col-lg-4
                  <?php elseif ($column_ratio == 'thirty_seventy' && $number==2 ): ?>col-lg-8
                  <?php elseif ($column_ratio == 'seventy_thirty' && $number==1 ): ?>col-lg-8
                  <?php elseif ($column_ratio == 'seventy_thirty' && $number==2 ): ?>col-lg-4
                  <?php else: ?>col-lg-6<?php endif; ?>">
				<?php if ($column_content) { ?>
					<div<?php if($col_count==$number): ?> class="col-content col-content-last" data-aos="fade-up" data-aos-delay="200"<?php else: ?> class="col-content col-content-first" data-aos="fade-up"<?php endif;?> data-aos-once="true">
						<?= $column_content ?>
					</div><!-- /col-content -->
				<?php } ?>
			</div><!-- /col -->
			<?php endwhile; ?>
		</div><!-- /row -->
    <?php endif; ?>
		
		
		<?php get_template_part( 'partials/row-footer-cta' ); ?>
    
  </div><!-- /container --> 
</section><!-- /row-outer -->