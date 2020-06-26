<?php get_header(); ?>

<div class="page-hero row-outer">
  <div class="container">
    <div class="row text-center justify-content-center"> 
			<div class="col-xl-9">
				<header class="entry-header">
					<h1 class="entry-title">404: Page not found.</h1>
				</header>
			</div><!-- /col -->
        
    </div> <!-- /row -->
  </div> <!-- /container -->
</div> <!-- /page-header-outer -->

<div class="row-outer">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-xl-9">

				<?php get_template_part( 'partials/content', 'none' ); ?>

			</div><!-- /col -->

		</div><!-- /row -->
	</div><!-- /container -->
</div> <!-- /row-outer -->


<?php get_footer(); ?>