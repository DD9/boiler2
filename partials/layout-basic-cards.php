<?php
$background_color = get_sub_field('background_color');
$row_image_field = get_sub_field('background_image');
$row_image = $row_image_field['sizes'][ 'large' ];
$cards_per_row = get_sub_field('cards_per_row');
$intro = get_sub_field('intro');
?>
<section class="layout-basic-cards row-outer
								<?php if( $background_color == 'light' ): ?> bg-gray-light
								<?php elseif( $background_color == 'dark' ): ?> bg-gray-dark
								<?php elseif( $background_color == 'brand_color' ): ?> bg-primary
								<?php elseif( $background_color == 'image' ): ?> bg-img bg-img-shaded
								<?php else: ?> bg-white<?php endif; ?>"
				 <?php if( $background_color == 'image' && $row_image ){ ?> style="background-image: url('<?= $row_image ?>');"<?php } ?>
				 >
  <div class="container">
  
  	<?php if ($intro ) { ?>
  	<div class="row<?php if( $background_color == 'dark' || $background_color == 'brand_color' || $background_color == 'image' ){ ?> text-white<?php } ?>">   
    	<div class="col-md-12">
      	<div class="content-block">
          <?= $intro ?>
        </div> <!-- /content-block -->
      </div><!-- / col -->
    </div><!-- /row -->
    <?php } ?>
    
    <div class="row">        	
      <div class="col-lg-12">

				<ul class="card-deck justify-content-center text-center<?php if ($cards_per_row == "one"): ?> card-deck-ones<?php elseif ($cards_per_row == "two"): ?> card-deck-twos<?php elseif ($cards_per_row == "three"): ?> card-deck-threes<?php elseif ($cards_per_row == "four"): ?> card-deck-fours<?php endif; ?>">
				<?php while ( have_rows('cards') ) : the_row(); 
					$title = get_sub_field('title');
					$content = get_sub_field('content');
					$card_image_field = get_sub_field('image');
					$card_image = $card_image_field['sizes'][ 'medium' ];
					$link_url = get_sub_field('link_url');
					$link_text = get_sub_field('link_text');
				?>
					
					<li class="card">
			
						<div class="card-img bg-img" style="background-image: url('<?php if ($card_image): ?><?= $card_image ?><?php else: ?><?= get_bloginfo('template_directory'); ?>/images/default_thumbnail.jpg<?php endif; ?>');">
						</div>
						
						<?php if ($title || $content) { ?>
							<div class="card-body">
								<?php if ($title) { ?><h4 class="card-title"><?= $title ?></h4><?php } ?>

								<?php if ($content) { ?>
									<div class="card-text">
										<?= $content ?>
									</div><!-- /card-text -->
								<?php } ?>

							</div><!-- /card-body -->
						<?php } ?>
						
						<div class="card-footer">
							<?php if ($link_url) { ?>
								<a href="<?= $link_url ?>" class="btn btn-sm btn-primary"><?php if ($link_url): ?><?= $link_text ?><?php else: ?> Link Text<?php endif; ?></a>
							<?php } ?>
						</div>
					
					</li><!-- /card-one-fourth -->
				
					<?php endwhile; ?>
				</ul><!-- /card-group -->
     
        
      </div><!-- /col -->      
    </div><!-- /row -->
    
  </div><!-- /container --> 
</section><!-- /row-outer -->