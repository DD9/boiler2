<?php if( have_rows('row_cta_buttons') ): ?>
	<div class="row-footer-cta">        	
    <?php while( have_rows('row_cta_buttons') ): the_row(); 
      $link_text = get_sub_field('link_text');
      $link_target = get_sub_field('link_target');
      $page_or_url = get_sub_field('page_or_url');
      $link_page = get_sub_field('link_page');
      $link_url = get_sub_field('link_url');
      if ($page_or_url == 'page' && $link_page) {
        $link = $link_page;
      } elseif ($page_or_url == 'url' && $link_url)  {
        $link = $link_url;
      }
    ?>

      <?php if ( $link_page || $link_url ){ ?>
        <a href="<?= $link ?>" class="btn btn-primary" target="<?= $link_target ?>"><?php echo $link_text ? $link_text : 'Learn More'; ?></a>
      <?php } ?>

    <?php endwhile; ?>
	</div><!-- /row-footer-cta -->
<?php endif; ?>
