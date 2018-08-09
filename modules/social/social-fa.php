<?php
/*
** Template to Render Social Icons on Top Bar
*/

for ($i = 1; $i < 8; $i++) : 
	$social = esc_attr( get_theme_mod('nevler_social_'.$i) );
	$social_url = esc_url( get_theme_mod('nevler_social_url'.$i) );
	if ( ($social != 'none') && ($social != '') && ( $social_url != '' )) : ?>
	<a class="social-icon hvr-bounce-to-bottom" href="<?php echo $social_url; ?>"><i class="fa fa-<?php echo $social; ?>"></i></a>
	<?php endif;

endfor; ?>