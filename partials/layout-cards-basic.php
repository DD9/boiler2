<?php 
$cards_per_row = get_sub_field('cards_per_row');
$card_type = get_sub_field('card_type');
$anchor_name = get_sub_field('anchor_name');
?>




<div class="container">

  <?php get_template_part( 'partials/row-intro' ); ?>

  <div class="row">        	
    <div class="col">

      <?php if( have_rows('cards') ): $count = 0; ?>


        <ul class="card-deck justify-content-center text-cente card-deck-threes">

          <?php while ( have_rows('cards') ) : the_row(); 
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            $card_image_field = get_sub_field('image');
            $card_image = $card_image_field['sizes'][ 'medium' ];

            $add_card_cta = get_sub_field('add_card_cta');
            $card_cta = get_sub_field('card_cta');
            $link_text = $card_cta['link_text'];
            $link_target = $card_cta['link_target'];
            $page_or_url = $card_cta['page_or_url'];
            $link_page = $card_cta['link_page'];
            $link_url = $card_cta['link_url'];
            if ($page_or_url == 'page' && $link_page) {
              $link = $link_page;
            } elseif ($page_or_url == 'url' && $link_url)  {
              $link = $link_url;
            }
            $count++;
          ?>


            <li class="card">

              <?php if ($card_image) { ?>
              <div class="card-img bg-img<?php if ($card_type == "icon_cards"){ ?> card-img-contained card-icon<?php }?><?php if ($link_page || $link_url) { ?> has-full-width-link<?php } ?>" style="background-image: url('<?= $card_image ?>');">
                <?php if ($link_page || $link_url) { ?><a href="<?= $link ?>" class="full-width" target="<?= $link_target ?>" title="<?php echo $title ? $title : 'Learn More' ?>"></a><?php } ?>
              </div>
              <?php } ?>

              <?php if ($title || $content) { ?>
                <div class="card-body">
                  <?php if ($title) { ?>
                    <?php if ($cards_per_row == "one"): ?><h2 class="card-title"><?php else: ?><h3 class="card-title"><?php endif; ?>
                      <?php if ($link_page || $link_url) { ?><a href="<?= $link ?>" target="<?= $link_target ?>" title="<?= $title?>"><?php } ?>
                      <?= $title ?>
                      <?php if ($link_page || $link_url) { ?></a><?php } ?>
                    <?php if ($cards_per_row == "one"): ?></h2><?php else: ?></h3><?php endif; ?>
                  <?php } ?>

                  <?php if ($content) { ?>
                    <div class="card-text">
                      <?= $content ?>
                    </div><!-- /card-text -->
                  <?php } ?>

                </div><!-- /card-body -->
              <?php } ?>

              <?php if( $add_card_cta && ( $link_text) ) { ?>
                <div class="card-footer">
                  <a href="<?= $link ?>" class="btn btn-primary" target="<?= $link_target ?>" title="<?php echo $title ? $title : 'Learn More' ?>"><?= $link_text ?></a>
                </div>
              <?php } ?>


            </li><!-- /card -->


          <?php endwhile; ?>


        </ul><!-- /card-deck -->

      <?php endif; ?>

    </div><!-- /col -->      
  </div><!-- /row -->


  <?php get_template_part( 'partials/row-footer-cta' ); ?>

</div><!-- /container --> 


