<?php
$background_color = get_sub_field('background_color');
$cards_per_row = get_sub_field('cards_per_row');
$intro = get_sub_field('intro');
?>
<section class="layout-basic-cards row-outer<?php if( $background_color == 'light' ): ?> bg-gray-light<?php elseif( $background_color == 'dark' ): ?> bg-gray-dark<?php else: ?> bg-white<?php endif; ?>">
  <div class="container">
  
  	<?php if ($intro ) { ?>
  	<div class="row<?php if( $background_color == 'dark' ){ ?> text-white<?php } ?>">   
    	<div class="col-md-12">
      	<div class="content-block">
          <?= $intro ?>
        </div> <!-- /content-block -->
      </div><!-- / col -->
    </div><!-- /row -->
    <?php } ?>
    
    <div class="row">        	
      <div class="col-lg-12">

				<ul class="card-stack<?php if ($cards_per_row == "one"): ?> card-stack-ones<?php elseif ($cards_per_row == "two"): ?> card-stack-twos<?php elseif ($cards_per_row == "three"): ?> card-stack-threes <?php elseif ($cards_per_row == "four"): ?> card-stack-fours<?php endif; ?>">
				<?php while ( have_rows('cards') ) : the_row(); 
					$title = get_sub_field('title');
					$content = get_sub_field('content');
					$image_field = get_sub_field('image');
					$image = $image_field['sizes'][ 'medium' ];
					$link_url = get_sub_field('link_url');
					$link_text = get_sub_field('link_text');
				?>
					
					<li class="card">
			
						<div class="card-img bg-img" style="background-image: url('<?php if ($image): ?><?= $image ?><?php else: ?><?= get_bloginfo('template_directory'); ?>/images/default_thumbnail.jpg<?php endif; ?>');">
						</div>
						
						<?php if ($title || $content || $link_url) { ?>
							<div class="card-body">
								<?php if ($title) { ?><h4 class="card-title"><?= $title ?></h4><?php } ?>

								<?php if ($content) { ?>
									<div class="card-text">
										<?= $content ?>
									</div><!-- /card-text -->
								<?php } ?>

								<?php if ($link_url) { ?>
									<a href="<?= $link_url ?>"><?php if ($link_url): ?><?= $link_text ?><?php else: ?> Link Text<?php endif; ?></a>
								<?php } ?>
							</div><!-- /card-body -->
						<div class="card-footer">
							<small class="text-muted">Last updated 3 mins ago</small>
						</div>
						<?php } ?>
					
					</li><!-- /card-one-fourth -->
				
					<?php endwhile; ?>
				</ul><!-- /card-group -->
     
        
      </div><!-- /col -->      
    </div><!-- /row -->
    
  </div><!-- /container --> 
</section><!-- /row-outer -->