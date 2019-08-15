<?php


// wp thumbnails (sizes handled in functions.php)
add_theme_support( 'post-thumbnails' );

// default thumb size
set_post_thumbnail_size(560, 300, true);



/************* THUMBNAIL SIZE OPTIONS *************/
add_image_size( 'extra_large', 1800 );
