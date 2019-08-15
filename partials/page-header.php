
<?php
//Responsive Images: CSS
if ( is_page_template( 'page-templates/page-images-css.php' ) ) : ?>
  <?php
  $featured_image_sm = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
  $featured_image_md = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
  $featured_image_lg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
  $featured_image_xl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'extra_large' );
  ?>

  <?php if ( has_post_thumbnail() ) { ?>
  <style type="text/css">
    #page-hero {
      background-image: url("<?= $featured_image_sm[0]; ?>");
    }
    @media (min-width: 576px) {
      #page-hero {
        background-image: url("<?= $featured_image_md[0]; ?>");
      }
    }
    @media (min-width: 992px) {
      #page-hero {
        background-image: url("<?= $featured_image_lg[0]; ?>");
      }
    }
    @media (min-width: 1200px) {
      #page-hero {
        background-image: url("<?= $featured_image_xl[0]; ?>");
      }
    }
  </style>
  <?php } ?>


<div id="page-hero" class="d-flex align-items-center justify-content-center row-outer text-light<?php if ( has_post_thumbnail() ) {?> bg-img<?php } ?>">
	<div class="container">
		<div class="row text-center justify-content-center">   
			<div class="col">
				<header class="entry-header">					
					
					<?php if ( is_singular('post') ) { ?>
						<?php get_template_part( 'partials/entry-meta-single-post' ); ?>
					<?php } ?>
					
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header> 	
			</div> <!-- /col -->
		</div> <!-- /row -->
	</div> <!-- /container -->
</div> <!-- /page-hero -->




<?php 
//Responsive Images: JS
elseif( is_page_template( 'page-templates/page-images-js.php' ) ): 
?>

  <?php 
  $featured_image_id = get_post_thumbnail_id( $post->ID );
  $featured_image_test = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
  ?>

  <script>
  // https://roots.io/guides/responsive-background-images-using-blade-components/
  //https://aclaes.com/responsive-background-images-with-srcset-and-sizes/  
  </script>



  <div id="page-hero" class="d-flex align-items-center justify-content-center row-outer text-light<?php if ( has_post_thumbnail() ) {?> bg-img<?php } ?>"
    data-background-image-srcset="<?php echo wp_get_attachment_image_srcset( $featured_image_id, 'large' ) ?>">
  
    <?php /*?><img style="display:none" src="<?php echo wp_get_attachment_image_url( $featured_image_id, 'large' ) ?>"
         srcset="<?php echo wp_get_attachment_image_srcset( $featured_image_id, 'large' ) ?>"
         sizes="<?php echo wp_get_attachment_image_sizes( $featured_image_id, 'large' ) ?>" /><?php */?>

    <div class="container">
      <div class="row text-center justify-content-center">   
        <div class="col">
          <header class="entry-header">					

            <?php if ( is_singular('post') ) { ?>
              <?php get_template_part( 'partials/entry-meta-single-post' ); ?>
            <?php } ?>

            <h1 class="entry-title">(<?= $featured_image_id ?> )<?php the_title(); ?></h1>
          </header> 	
        </div> <!-- /col -->
      </div> <!-- /row -->
    </div> <!-- /container -->
  </div> <!-- /page-hero -->




<?php else: ?>
<div id="page-hero" class="d-flex align-items-center justify-content-center row-outer text-light">
	<div class="container">
		<div class="row text-center justify-content-center">   
			<div class="col">
				<header class="entry-header">					
					
					<?php if ( is_singular('post') ) { ?>
						<?php get_template_part( 'partials/entry-meta-single-post' ); ?>
					<?php } ?>
					
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header> 	
			</div> <!-- /col -->
		</div> <!-- /row -->
	</div> <!-- /container -->
</div> <!-- /page-hero -->


<?php endif; ?>
