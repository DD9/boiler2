<?php 
$background = get_sub_field('background');
?>

<?php if( $background['background_style'] == 'red' ): ?> bg-primary
<?php elseif( $background['background_style'] == 'gray_light' ): ?> bg-gray-light
<?php elseif( $background['background_style'] == 'geo_red' ): ?> bg-geo-red
<?php elseif( $background['background_style'] == 'geo_gray_light' ): ?> bg-geo-gray-light
<?php else: ?> bg-none<?php endif; ?>
			