<?php
$background_color = get_sub_field('background_color');
$row_image_field = get_sub_field('background_image');
$row_image = $row_image_field['sizes'][ 'large' ];
$alignment = get_sub_field('alignment');
$width = get_sub_field('width');
$content = get_sub_field('content');
?>
<section class="layout-single-column row-outer
								<?php if( $background_color == 'light' ): ?> bg-gray-light
								<?php elseif( $background_color == 'dark' ): ?> bg-gray-dark
								<?php elseif( $background_color == 'brand_color' ): ?> bg-primary
								<?php elseif( $background_color == 'image' ): ?> bg-img bg-img-shaded
								<?php else: ?> bg-white<?php endif; ?>"
				 <?php if( $background_color == 'image' && $row_image ){ ?> style="background-image: url('<?= $row_image ?>');"<?php } ?>
				 >
  <div class="container">
  
  	<?php if ($content ) { ?>
  	<div class="row<?php if($width == 'narrow' && $alignment == 'center'): ?> justify-content-center<?php elseif($width == 'narrow' && $alignment == 'right'):?> justify-content-end<?php endif; ?><?php if($background_color == 'dark' || $background_color == 'brand_color' || $background_color == 'image' ){ ?> text-white<?php } ?>">   
    	<div class="<?php if($width == 'narrow'): ?>col-md-6<?php else: ?>col<?php endif; ?>">
      	<div class="last-child-no-bm">
          <?= $content ?>
        </div> <!-- /col-content -->
      </div><!-- / col -->
    </div><!-- /row -->
    <?php } ?>
    
    
  </div><!-- /container --> 
</section><!-- /row-outer -->