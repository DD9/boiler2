<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

<?php //<meta name="HandheldFriendly" content="True">  ?>
<?php //<meta name="MobileOptimized" content="320">  ?>
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
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage">
				<img src="<?= get_bloginfo('template_directory'); ?>/images/logo_dd9.png" alt="<?php bloginfo( 'name' ) ?> Logo" />
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-responsive-collapse" aria-controls="navbar-responsive-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar-responsive-collapse">
				<?php bones_main_nav(); ?>
			</div>
		</div><!-- /container -->
	</nav><!-- /navbar --> 

</header> <?php // end site-header ?>
