<?php
/**
 * Team Member
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'block-basic-cards-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-basic-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' row-outer align' . $block['align'];
}

$background_color = get_field('background_color');
$text_color = get_field('text_color');

?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="row">        	
      <div class="col">
        <?php if ( have_rows('cards') ) : ?>
        <ul class="card-deck justify-content-center card-deck-threes">
        <?php while ( have_rows('cards') ) : the_row(); 
          $title = get_sub_field('title') ?: 'Card title';
          $content = get_sub_field('content') ?: 'Card content here...';
          $card_image_field = get_sub_field('image');
          $card_image = $card_image_field['sizes'][ 'medium' ];
        ?>

          <li class="card card-transparent">

            <div class="card-img bg-img" style="background-image: url('<?php if ($card_image): ?><?= $card_image ?><?php else: ?><?= get_bloginfo('template_directory'); ?>/images/default_thumbnail.jpg<?php endif; ?>');">
            </div>

            <?php if ($title || $content) { ?>
              <div class="card-body">
                <?php if ($title) { ?><header class="card-header"><h3 class="card-title"><?= $title ?></h3></header><?php } ?>

                <?php if ($content) { ?>
                  <div class="card-text">
                    <?= $content ?>
                  </div><!-- /card-text -->
                <?php } ?>

              </div><!-- /card-body -->
            <?php } ?>


          </li><!-- /card -->

        <?php endwhile; ?>
        </ul><!-- /card-group -->
        <?php endif; ?>

      </div><!-- /col -->      
    </div><!-- /row -->
  </div><!-- /container -->

    <style type="text/css">
        #<?php echo $id; ?> {
            background-color: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
        }
    </style>

</section><!-- /row-outer -->