<!doctype html>
<html <?php language_attributes(); ?> class="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php wp_title(''); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"> 
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png">    		
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
<!--[if IE]>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<![endif]-->

<?php wp_head(); ?>

<?php // drop Google Analytics Here ?>
<?php // end analytics ?>

</head>

<body <?php body_class(); ?>>

<?php edit_post_link('Edit'); ?>  

<header id="site-header">
	<div class="container">
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage">
				<img src="<?= get_bloginfo('template_directory'); ?>/images/logo_dd9.png" alt="<?php bloginfo( 'name' ) ?> Logo" />
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-responsive-collapse" aria-controls="navbar-responsive-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navbar-responsive-collapse" class="collapse navbar-collapse">
				<?php bones_main_nav(); ?>
			</div>
	  </nav><!-- /navbar --> 
  </div><!-- /container -->
</header> <?php // end site-header ?>
