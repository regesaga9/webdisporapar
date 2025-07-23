<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( BlogxerTheme::$layout == 'full-width' ) {
	$blogxer_layout_class = 'col-sm-12 col-12';
}
else{
	$blogxer_layout_class = BlogxerTheme_Helper::has_active_widget() . 'Lipu ';
}
?>
<div id="primary" class="content-area shop-page">
	<div class="container">
		<div class="row">
			<?php if ( BlogxerTheme::$layout == 'left-sidebar' ) { ?>
				<div class="col-lg-3 col-md-12 col-12 fixed-bar-coloum">
					<aside class="sidebar-widget-area">
						<?php if ( is_active_sidebar( 'shop-sidebar-1' ) ) dynamic_sidebar( 'shop-sidebar-1' ); ?>
					</aside>
				</div>
			<?php }	?>
			<div class="<?php echo esc_attr( $blogxer_layout_class );?>">
				<main id="main" class="site-main">