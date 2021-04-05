<?php 
$cards = get_sub_field('cards');
$team_members = get_sub_field('team_members');
$columns = get_sub_field('columns');
$panels = get_sub_field('panels');
$gallery_images = get_sub_field('gallery_images');
$background = get_sub_field('background'); 
?>

<?php 
  if( have_rows('row_intro') ):
  while( have_rows('row_intro') ): the_row(); 
  $intro_content = get_sub_field('content');
  ?>
    <div class="row justify-content-center<?php if( in_array($background['background_style'], ['red', 'geo_red']) ) { ?> text-white<?php } ?>">   
      <div class="col">
        <?php if ( $cards || $team_members || $columns || $panels || $gallery_images ): ?>
          <div class="content-block">
            <?= $intro_content ?>
          </div> <!-- /content-block -->
        <?php else: ?>
          <div class="col-content col-content-last">
            <?= $intro_content ?>
          </div>
        <?php endif; ?>
      </div><!-- / col -->
    </div><!-- /row -->
  <?php 
  endwhile;
  endif; 
  ?>