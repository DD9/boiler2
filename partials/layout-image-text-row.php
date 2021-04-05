<?php
$alignment = get_sub_field('alignment');
$image_size = get_sub_field('image_size');
$image_field = get_sub_field('image');
$image = $image_field['sizes'][ 'medium' ];
$content = get_sub_field('content');
?>
<section class="layout-image-text-row row-outer row-aos<?php get_template_part( 'partials/style-background' ); ?><?php get_template_part( 'partials/style-text' ); ?>"<?php get_template_part( 'partials/style-background-image' ); ?>>
    
	<div class="container">
    		  
		<div class="row align-items-center<?php if ($alignment == 'image_left'){ ?> justify-content-end<?php } ?>">	
      
      <?php if ($image) { ?>
			<div class="<?php if ($image_size == 'thirty_percent' ): ?>col-lg-4<?php else: ?>col-lg-6<?php endif; ?><?php if ($alignment == 'image_right'){ ?> order-lg-last<?php } ?>">
        <div class="col-content col-content-image text-center"<?php if ($alignment == 'image_right'): ?> data-aos="fade-left"  data-aos-delay="200"<?php else: ?> data-aos="fade-right"<?php endif; ?> data-aos-anchor-placement="center-bottom" data-aos-once="true"> 
          <img src="<?= $image ?>" />
        </div><!-- /col-content -->
			</div><!-- /col -->
      <?php } ?>
      
      <?php if ($content) { ?>
			<div class="<?php if ($image_size == 'thirty_percent' ): ?>col-lg-8<?php else: ?>col-lg-6<?php endif; ?><?php if ($alignment == 'image_right'){ ?> order-lg-first<?php } ?>">
        <div class="col-content col-content-last"<?php if ($alignment == 'image_right'): ?> data-aos="fade-right"<?php else: ?> data-aos="fade-left" data-aos-delay="200"<?php endif; ?> data-aos-anchor-placement="center-bottom" data-aos-once="true">
          <?= $content ?>
          <?php get_template_part( 'partials/row-footer-cta' ); ?>
        </div><!-- /col-content -->
			</div><!-- /col -->
      <?php } ?>
      
		</div><!-- /row -->
		
    
  </div><!-- /container --> 
</section><!-- /row-outer -->