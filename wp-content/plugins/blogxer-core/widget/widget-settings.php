<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'blogxer_widgets_init' );
function blogxer_widgets_init() {

	// Register Custom Widgets
	register_widget( 'BlogxerTheme_About_Widget' );
	register_widget( 'BlogxerTheme_Address_Widget' );
	register_widget( 'BlogxerTheme_Social_Widget' );
	register_widget( 'BlogxerTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'BlogxerTheme_Post_Box' );
	register_widget( 'BlogxerTheme_Post_Tab' );
	register_widget( 'BlogxerTheme_Feature_Post' );
	register_widget( 'BlogxerTheme_Open_Hour_Widget' );
	register_widget( 'BlogxerTheme_Product_Box' );
	
}