<?php
$background_color = get_sub_field('background_color');
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

				<ul class="card-group card-group-fourths">
				<?php while ( have_rows('cards') ) : the_row(); 
					$title = get_sub_field('title');
					$content = get_sub_field('content');
					$image_field = get_sub_field('image');
					$image = $image_field['sizes'][ 'medium' ];
					$link_url = get_sub_field('link_url');
					$link_text = get_sub_field('link_text');
				?>
					<li class="card card-one-fourth">
			
						<?php if ($title) { ?><h4 class="card-title"><?= $title ?></h4><?php } ?>
						
						
						
						<div class="card-image bg-image" style="background-image: url('<?php if ($image): ?><?= $image ?><?php else: ?><?= get_bloginfo('template_directory'); ?>/images/default_thumbnail.jpg<?php endif; ?>');">
							<?php if ($content) { ?>
								<div class="card-content">
									<div class="card-content-description"><?= $content ?></div>
								</div><!-- /card-content -->
							<?php } ?>
						</div>
						
					
						
						<?php if ($link_url) { ?>
							
							<a href="<?= $link_url ?>"><?php if ($link_url): ?><?= $link_text ?><?php else: ?> Link Text<?php endif; ?></a>
						<?php } ?>
					
					</li><!-- /card-one-fourth -->
				<?php endwhile; ?>
				</ul><!-- /card-group -->
     
        
      </div><!-- /col -->      
    </div><!-- /row -->
    
  </div><!-- /container --> 
</section><!-- /row-outer -->