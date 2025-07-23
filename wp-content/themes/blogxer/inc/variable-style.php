<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Container
#. Top Bar
#. Header
#. Typography
#. Banner
#. Footer
#. Widgets
#. Inner Contents
#. Error 404
#. comment
#. Buttons
#. Single Content
#. Archive Contents
#. Pagination
#. Contact Form 7
#. Single Team
#. WooCommerce
#. Miscellaneous
-------------------------------------*/

$primary_color         = BlogxerTheme::$options['primary_color']; // #444444
$primary_rgb           = BlogxerTheme_Helper::hex2rgb( $primary_color ); // 68, 68, 68
$secondary_color       = BlogxerTheme::$options['secondary_color']; // #646464
$secondary_rgb         = BlogxerTheme_Helper::hex2rgb( $secondary_color ); // 100, 100, 100

$container_width	   = BlogxerTheme::$options['container_width']; // Grid Container width

$menu_typo             = BlogxerTheme::$options['menu_typo'];
$menu_color            = BlogxerTheme::$options['menu_color'];
$menu_color_tr         = BlogxerTheme::$options['menu_color_tr'];
$menu_hover_color      = BlogxerTheme::$options['menu_hover_color'];
$submenu_typo          = BlogxerTheme::$options['submenu_typo'];
$submenu_color         = BlogxerTheme::$options['submenu_color'];
$submenu_bgcolor       = BlogxerTheme::$options['submenu_bgcolor'];
$submenu_hover_color   = BlogxerTheme::$options['submenu_hover_color'];
$submenu_hover_bgcolor = BlogxerTheme::$options['submenu_hover_bgcolor'];
$resmenu_typo          = BlogxerTheme::$options['resmenu_typo'];

$blogxer_typo_body     = BlogxerTheme::$options['typo_body'];
$blogxer_typo_h1       = BlogxerTheme::$options['typo_h1'];
$blogxer_typo_h2       = BlogxerTheme::$options['typo_h2'];
$blogxer_typo_h3       = BlogxerTheme::$options['typo_h3'];
$blogxer_typo_h4       = BlogxerTheme::$options['typo_h4'];
$blogxer_typo_h5       = BlogxerTheme::$options['typo_h5'];
$blogxer_typo_h6       = BlogxerTheme::$options['typo_h6'];


?>
<?php
/*-------------------------------------
#. Container
---------------------------------------*/
?>
@media ( min-width:1200px ) {
	.container {
		max-width: <?php echo esc_html( $container_width ); ?>px;
	}
}
.primary-color {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.secondary-color {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
?>
#tophead .tophead-contact .fa,
#tophead .tophead-address .fa {
	color: <?php echo esc_html( BlogxerTheme::$options['top_baricon_color'] ); ?>;
}
.header-top-bar .fa {
	color: <?php echo esc_html( BlogxerTheme::$options['top_baricon_color'] ); ?>;
}
.trheader #tophead .tophead-contact .fa,
.trheader #tophead .tophead-address .fa {
  color: <?php echo esc_html( BlogxerTheme::$options['top_baricon_color_tr'] ); ?>;
}
#tophead {
    background-color: <?php echo esc_html( BlogxerTheme::$options['top_bar_bgcolor'] ); ?>;
}
#tophead,
#tophead a {
    color: <?php echo esc_html( BlogxerTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-5 #tophead .tophead-social li a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.trheader #tophead,
.trheader #tophead a {
	color: <?php echo esc_html( BlogxerTheme::$options['top_bar_color_tr'] ); ?>;
}
.blogxer-primary-color{
	color:<?php echo esc_html( $primary_color ); ?>;
}
.blogxer-primary-bgcolor,
.topbar-style-3 #tophead .tophead-social li a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.topbar-style-4 #tophead .tophead-contact .fa,
.topbar-style-4 #tophead .tophead-address .fa {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.topbar-style-4 #tophead .tophead-contact a:hover,
.topbar-style-4 #tophead .tophead-right ul li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>
.site-header .main-navigation nav ul li a {
	font-family: <?php echo esc_html( $menu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $menu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $menu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $menu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	text-transform : <?php echo esc_html( $menu_typo['text-transform'] ); ?>;
	font-style: <?php echo empty( $menu_typo['font-style'] ) ? 'normal' : $menu_typo['font-style']; ?>;
}
.non-stickh .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.site-header .main-navigation ul.menu > li > a:hover,
.site-header .main-navigation ul.menu > li.current-menu-item > a,
.site-header .main-navigation ul.menu > li.current > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation nav ul li a.active {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.trheader .site-header .main-navigation nav > ul > li > a,
.trheader .site-header .main-navigation .menu > li > a {
	color: <?php echo esc_html( $menu_color_tr );?>;
}
.header-style-5.trheader .site-header .main-navigation nav > ul > li > a:hover,
.header-style-5.trheader .site-header .main-navigation nav > ul > li.current-menu-item > a:hover,
.header-style-5.trheader .site-header .main-navigation nav > ul > li a.active,
.header-style-5.trheader .site-header .main-navigation nav > ul > li.current > a,
.header-style-1 .site-header .main-navigation ul.menu > li.current > a:hover,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a:hover,
.header-style-1 .site-header .main-navigation  ul li a.active,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a,
.header-style-1 .site-header .main-navigation ul.menu > li.current > a  {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.trheader.non-stick .site-header .main-navigation ul.menu > li > a,
.trheader.non-stick .site-header .search-box .search-button i,
.trheader.non-stick .header-icon-seperator,
.trheader.non-stick .header-icon-area .cart-icon-area > a, 
.trheader.non-stick .additional-menu-area a.side-menu-trigger {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}
.site-header .main-navigation nav > ul > li > a:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.header-button .ghost-btn {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php // Submenu ?>
.site-header .main-navigation ul li ul li {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
}
.site-header .main-navigation ul li ul li:hover {
	background-color: <?php echo esc_html( $submenu_hover_bgcolor ); ?>;
}
.site-header .main-navigation ul li ul li a {
	font-family: <?php echo esc_html( $submenu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $submenu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $submenu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $submenu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $submenu_color ); ?>;
	text-transform : <?php echo esc_html( $submenu_typo['text-transform'] ); ?>;
	font-style: <?php echo empty( $submenu_typo['font-style'] ) ? 'normal' : $submenu_typo['font-style']; ?>;
}
.site-header .main-navigation ul li ul li:hover > a {
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}
<?php // Sticky Menu ?>
.stick .site-header {
	border-color: <?php echo esc_html( $primary_color ); ?>
}
<?php // Multi Column Menu ?>
.site-header .main-navigation ul li.mega-menu > ul.sub-menu {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a,
.site-header .main-navigation ul li.mega-menu > ul.sub-menu li:before {
	color: <?php echo esc_html( $submenu_color ); ?>
}
<?php // Mean Menu ?>
.mean-container a.meanmenu-reveal,
.mean-container .mean-nav ul li a.mean-expand {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header-style-3 .header-bottom .main-navigation,
.mean-container a.meanmenu-reveal span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .mean-bar {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .mean-nav ul li a {
	font-family: <?php echo esc_html( $resmenu_typo['font-family'] ); ?>, sans-serif;
	font-size : <?php echo esc_html( $resmenu_typo['font-size'] ); ?>;
	font-weight : <?php echo esc_html( $resmenu_typo['font-weight'] ); ?>;
	line-height : <?php echo esc_html( $resmenu_typo['line-height'] ); ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	text-transform : <?php echo esc_html( $resmenu_typo['text-transform'] ); ?>;
	font-style: <?php echo empty( $resmenu_typo['font-style'] ) ? 'normal' : $resmenu_typo['font-style']; ?>;
}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav > ul > li.current-menu-item > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
<?php // Header icons ?>
.additional-menu-area a.side-menu-trigger:hover,
.trheader.non-stick .additional-menu-area a.side-menu-trigger:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.site-header .search-box .search-text {
	border-color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 2 ?>
.header-style-2.trheader .site-header .header-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}

<?php // Header Layout 3 ?>
.header-style-3 .header-contact .fa,
.header-style-3.trheader .header-social li a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.header-style-3.trheader .header-contact li a,
.header-style-3.trheader .header-social li a {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}
.site-header .header-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}

<?php // Header Layout 4 ?>
.header-style-4 .header-contact .fa,
.header-style-4 .header-social li a:hover,
.header-style-4.trheader .header-social li a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.header-style-4.trheader .header-contact li a,
.header-style-4.trheader .header-social li a {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}

<?php // Header Layout 5 ?>
.header-style-5 .header-menu-btn {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.trheader.non-stick.header-style-5 .header-menu-btn {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}
<?php // Header Layout 6 ?>
.header-style-6.trheader .site-header .header-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 8 ?>
.header-style-8.trheader .header-contact li a, 
.header-style-8.trheader .header-social li a {
	color: <?php echo esc_html( $menu_color_tr ); ?>;
}
.header-style-8.trheader .header-contact li a:hover, 
.header-style-8.trheader .header-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}

.additional-menu-area .sidenav ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.additional-menu-area .sidenav-address span a:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}
.additional-menu-area .sidenav-address span a i {
	color: <?php echo esc_html( $primary_color );?>;
}
.additional-menu-area .sidenav .closebtn {
	color: <?php echo esc_html( $primary_color );?>;
	border-color: <?php echo esc_html( $primary_color );?>;
}

<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body {
	font-family: <?php echo esc_html( $blogxer_typo_body['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_body['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_body['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_body['font-weight'] ); ?>;
}
h1 {
	font-family: <?php echo esc_html( $blogxer_typo_h1['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_h1['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_h1['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_h1['font-weight'] ); ?>;
}
h2 {
	font-family: <?php echo esc_html( $blogxer_typo_h2['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_h2['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_h2['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_h2['font-weight'] ); ?>;
}
h3 {
	font-family: <?php echo esc_html( $blogxer_typo_h3['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_h3['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_h3['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_h3['font-weight'] ); ?>;
}
h4 {
	font-family: <?php echo esc_html( $blogxer_typo_h4['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_h4['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_h4['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_h4['font-weight'] ); ?>;
}
h5 {
	font-family: <?php echo esc_html( $blogxer_typo_h5['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_h5['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_h5['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_h5['font-weight'] ); ?>;
}
h6 {
	font-family: <?php echo esc_html( $blogxer_typo_h6['font-family'] ); ?>, sans-serif;
	font-size: <?php echo esc_html( $blogxer_typo_h6['font-size'] ); ?>;
	line-height: <?php echo esc_html( $blogxer_typo_h6['line-height'] ); ?>;
	font-weight: <?php echo esc_html( $blogxer_typo_h6['font-weight'] ); ?>;
}
<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
?>
.entry-banner .entry-banner-content h1 {
	color: <?php echo esc_html( BlogxerTheme::$options['banner_heading_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a,
.breadcrumb-trail ul.trail-items li a {
	color: <?php echo esc_html( BlogxerTheme::$options['breadcrumb_link_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a:hover,
.breadcrumb-trail ul.trail-items li a:hover {
	color: <?php echo esc_html( BlogxerTheme::$options['breadcrumb_link_hover_color'] );?>;
}
.breadcrumb-trail ul.trail-items li,
.breadcrumb-area .entry-breadcrumb .breadcrumb-seperator {
	color: <?php echo esc_html( BlogxerTheme::$options['breadcrumb_seperator_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb > span:last-child,
.breadcrumb-trail ul.trail-items li > span {
	color: <?php echo esc_html( BlogxerTheme::$options['breadcrumb_active_color'] );?>;
}
.entry-banner:after {
    background: rgba(0, 0, 0 , <?php  echo esc_html( BlogxerTheme::$options['banner_bg_opacity'] ); ?>);
}
<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
?>
.scrollToTop {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border-color: <?php echo esc_html( $primary_color );?>;
} 
.footer-top-area {
	background-color: <?php echo esc_html( BlogxerTheme::$options['footer_bgcolor'] ); ?>;
}
.footer-top-area .widget h3 {
	color: <?php echo esc_html( BlogxerTheme::$options['footer_title_color'] ); ?>;
}
.footer-top-area .widget {
	color: <?php echo esc_html( BlogxerTheme::$options['footer_color'] ); ?>;
}
.footer-bottom-area a:link, 
.footer-bottom-area a:visited,
.footer-top-area .widget a:link,
.footer-top-area .widget a:visited,
.footer-top-area .rt_footer_social_widget .footer-social li a i,
.footer-style-3 .footer-social ul li a,
.footer-style-4 .footer-social ul li a,
.footer-style-5 .footer-bottom-social ul li a {
	color: <?php echo esc_html( BlogxerTheme::$options['footer_link_color'] ); ?>;
}

.footer-top-area .widget a:hover,
.footer-top-area .widget a:active,
.footer-bottom-area a:hover,
.footer-bottom-area .widget ul li a:hover,
.footer-style-4 .footer-social ul li a:hover,
.footer-style-5 .footer-bottom-social ul li a:hover {
	color: <?php echo esc_html( BlogxerTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-bottom-area {
	background-color: <?php echo esc_html( BlogxerTheme::$options['copyright_bgcolor'] ); ?>;
	color: <?php echo esc_html( BlogxerTheme::$options['copyright_color'] ); ?>;
}
.footer-top-area,
.footer-bottom-area .footer-bottom-left {
	color: <?php echo esc_html( BlogxerTheme::$options['copyright_color'] ); ?>;
}
.footer-top-area .widget_archive li {
	border-bottom: 1px dotted <?php echo esc_html( $primary_color ); ?>;
}
.rt-box-title-1 span {
	border-top-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .rt_footer_social_widget .footer-social li a:hover i,
.footer-style-3 .footer-social ul li a:hover {
	color: <?php echo esc_html( BlogxerTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-area .copyright a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-area .copyright a {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
.footer-top-area .widgettitle:after {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php
/*-------------------------------------
#. Widgets
---------------------------------------*/
?>
.search-form .input.search-submit {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.search-form .input.search-submit a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.widget ul li a:hover,
.sidebar-widget-area .widget ul li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget .rt-slider-sidebar .rt-single-slide .testimo-info .testimo-title h3,
.sidebar-widget-area .rt_widget_recent_entries_with_image .media-body .posted-date a,
.sidebar-widget-area .widget ul li.active a,
.sidebar-widget-area .widget ul li.active a:before,
.footer-top-area .search-form input.search-submit,
.footer-top-area ul li:before,
.footer-top-area ul li a:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .search-form input.search-submit,
.footer-top-area ul li a:before,
.footer-top-area .stylish-input-group .input-group-addon button i,
.footer-top-area .widget_archive li a:before {
  color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .stylish-input-group .input-group-addon button:hover {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.rt-box-title-1,
.footer-top-area .search-form button {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-topbar ,
.footer-topbar .emergrncy-content-holder{
	background: <?php echo esc_html( $primary_color ); ?>;
}
.footer-topbar .emergrncy-content-holder:before {
	border-color: transparent <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget h3.widgettitle:after,
.elementor-widget-container h5:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-news-box .media-body h3 a:hover,
.post-tab-layout .entry-title a:hover,
.rt-news-box .post-box-date ul li i,
.post-tab-layout .post-box-date ul li i,
.feature-post-layout .post-box-date ul li i,
.post-box-style .post-box-date ul li i {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget ul li a:before,
.sidebar-widget-area .widget_recent_comments ul li.recentcomments > span:before {
    color: <?php echo esc_html( $secondary_color ); ?>;
}
.feature-post-layout .entry-title a:hover,
.post-box-style .media-body h3 a:hover,
.post-box-style .post-box-date ul li a:hover,
.feature-post-layout .post-box-date ul li a:hover {
  color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. Inner Contents
---------------------------------------*/
?>
a:link,
a:visited,
.entry-footer .about-author .media-body .author-title,
.entry-title h1 a{
	color: <?php echo esc_html( $primary_color );?>;
}
.comments-area .main-comments .replay-area a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.blog-style-2 .readmore-btn:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
	color: #ffffff;
}
.sticky .blog-box,
.blog-layout-2.sticky,
.blog-layout-3.sticky {
  border-color: <?php echo esc_html( $primary_color );?>;
}

.blog-box .blog-img-holder .entry-content {
  background: <?php echo esc_html( $primary_color );?>;
}
.blog-box .blog-bottom-content-holder ul li i ,
.blog-box .blog-bottom-content-holder ul li a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .blog-bottom-content-holder ul li,
.blog-box .blog-bottom-content-holder ul li a,
.rt-news-box .post-date-dark ul li i {
  color: <?php echo esc_html( $secondary_color );?>;
}

<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
?>
.error-page-area {
    background-color: <?php echo esc_html( BlogxerTheme::$options['error_bodybg'] );?>;
}
.error-page-area .text-1 {	
	color: <?php echo esc_html( BlogxerTheme::$options['error_text1_color'] );?>;
}
.error-page-area .text-2 {
	color: <?php echo esc_html( BlogxerTheme::$options['error_text2_color'] );?>;
}

<?php
/*-------------------------------------
#. Comment
---------------------------------------*/
?>
#respond form .btn-send {
	background-color: <?php echo esc_html( $primary_color );?>;
	border-color: <?php echo esc_html( $primary_color );?>;
}
#respond form .btn-send:hover {
  background-color: <?php echo esc_html( $secondary_color );?>;
}
.item-comments .item-comments-list ul.comments-list li .comment-reply {
  background-color: <?php echo esc_html( $primary_color );?>;
}
.title-bar35:after {
	background: <?php echo esc_html( $primary_color );?>;
}
<?php
/*------------------------------------
#. Buttons
------------------------------------*/
?>
a.blog-button {
	color: <?php echo esc_html( $primary_color );?> !important;	
	border-color: <?php echo esc_html( $primary_color );?>;	
}
.blogxer-button-2 {
	background: <?php echo esc_html( $primary_color );?>;
	border-color: <?php echo esc_html( $primary_color );?>;	
}
.blogxer-button-2:hover {
	background: <?php echo esc_html( $secondary_color );?>;
}
.entry-content a.grid-fill-btn:hover:after,
.entry-content .rt-grid-fill-btn a.grid-fill-btn:hover:after {
	color: <?php echo esc_html( $primary_color );?>;	
}
.blogxer-button-1:hover {
	background: <?php echo esc_html( $primary_color );?>;
	border-color: <?php echo esc_html( $primary_color );?>;
}
.blogxer-button-1 {
	border-color: <?php echo esc_html( $secondary_color ); ?>;
	background: <?php echo esc_html( $secondary_color );?>;
}
.blogxer-primary-color {
	color: <?php echo esc_html( $primary_color );?>;
}
.wpcf7-form input[type="submit"] {
	background: <?php echo esc_html( $primary_color );?>;
}
.wpcf7-form input[type="submit"]:hover {
	background: <?php echo esc_html( $secondary_color );?>;
}
.entry-content .item-btn,
.rtin-content .item-btn {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-content .item-btn:hover,
.rtin-content .item-btn:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}


<?php
/*-------------------------------------
#. Single Content
---------------------------------------*/
?>
.entry-footer ul.item-tags li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.ui-cat-tag span a:hover {
    background: <?php echo esc_html( $primary_color );?>;
}
.post-navigation .post-nav-title a:hover,
.about-author ul.author-box-social li a:hover,
.entry-footer .item-tags a:hover,
.post-navigation .prev-article:hover,
.post-navigation .next-article:hover,
.post-navigation .prev-article a:hover,
.post-navigation .next-article a:hover,
.entry-header .entry-meta ul li a:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}
.entry-header .entry-post-meta ul li a,
.blog-box .entry-content ul li i,
.entry-header .entry-meta ul li i,
.entry-footer .item-tags span {
	color: <?php echo esc_html( $secondary_color );?>;
}
.entry-header .entry-meta .post-date,
.post-detail-style2 .entry-meta .post-date {
  background: <?php echo esc_html( $primary_color );?>;
}
.single-post .entry-content ol li:before,
.entry-content ol li:before,
.comments-area h4:after,
.rt-related-post .title-section h2:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
blockquote p:before {
	color: <?php echo esc_html( $secondary_color );?>;
}
.comments-area .main-comments .replay-area a {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*-------------------------------------
#. Archive Contents
---------------------------------------*/
?>
.blog-layout-1 .entry-header .entry-thumbnail-area .post-date1 {
	background: <?php echo esc_html( $primary_color );?>;
}
.blog-layout-1 .entry-header .entry-content h3 a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-layout-1 .entry-header .entry-content .blogxer-button-7 {
  background: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul li i {
  color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul li a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul .active {
  background: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-content h3 a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .blog-social li a:hover i {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php /*blog style 2*/ ?>
.blog-box .blog-img-holder .entry-content {
  background: <?php echo esc_html( $primary_color );?>;
}
.blog-layout-2 .entry-meta .blog-cat ul li a,
.entry-footer .post-share > span,
.entry-footer .post-share .share-links a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .entry-content h3 a:hover,
.blog-layout-2 .entry-content h3 a:hover,
.blog-layout-3 .entry-content h3 a:hover,
.blog-box .blog-bottom-content-holder h3 a:hover,
.rt-related-post-info .post-title a:hover,
.rt-related-post-info .post-date ul li i {
	color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .entry-content ul li a:hover,
.blog-layout-2 .entry-meta ul li a:hover,
.blog-layout-3 .entry-meta ul li a:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}

<?php
/*-------------------------------------
#. Pagination
---------------------------------------*/
?>
.pagination-area li.active a:hover,
.pagination-area ul li.active a,
.pagination-area ul li a:hover,
.pagination-area ul li span.current{
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Contact Form 7
---------------------------------------*/
?>
.wpcf7-form .form-group .form-control:focus {
	border-color: <?php echo esc_html( $primary_color );?>;
}

<?php
/*-------------------------------------
#. Single Team
---------------------------------------*/
?>
.team-details-social li a {
  background: <?php echo esc_html( $primary_color );?>;
  border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.team-details-social li:hover a {
  border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.team-details-social li:hover a i {
  color: <?php echo esc_html( $primary_color );?>;
}
.skill-area .progress .lead {
  border: 2px solid <?php echo esc_html( $primary_color );?>;
}
.skill-area .progress .progress-bar {
  background: <?php echo esc_html( $primary_color );?>;
}
.team-details-info li i {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. WooCommerce
---------------------------------------*/
?>
.rt-woo-nav .owl-custom-nav-title::after,
.rt-woo-nav .owl-custom-nav .owl-prev:hover,
.rt-woo-nav .owl-custom-nav .owl-next:hover,
.woocommerce ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce a.added_to_cart,
.woocommerce #respond input#submit:hover,
.woocommerce div.product form.cart .button,
.woocommerce input.button:hover,
p.demo_store,
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit[disabled]:disabled:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button[disabled]:disabled:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button[disabled]:disabled:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button[disabled]:disabled:hover,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce .product-thumb-area .product-info ul li a:hover .fa,
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce div.product .product-meta a:hover,
.woocommerce a.woocommerce-review-link:hover,
.woocommerce .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}

.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	background-color: <?php echo esc_html( $primary_color );?>;
}

.woocommerce-message,
.woocommerce-info {
	border-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce .product-thumb-area .overlay {
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}
.woocommerce #respond input#submit,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce a.button {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce div.product form.cart .button:hover,
.woocommerce a.added_to_cart:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
  background-color: <?php echo esc_html( $secondary_color );?>;
}
.sidebar-widget-area .widget_search form button,
.woocommerce.widget_product_search button:before {
  color: <?php echo esc_html( $primary_color );?>;
}
.sidebar-widget-area .widget_search form button:hover,
.woocommerce ul.products li.product h3 a:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}
.cart-icon-products .widget_shopping_cart .mini_cart_item a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*----------------------
#. Miscellaneous
----------------------*/
?>
.rt-drop,
.post-detail-style3 .breadcrumbs-area2 .breadcrumbs-content ul li,
.post-detail-style3 .breadcrumbs-area2 .breadcrumbs-content ul li a, 
.post-detail-style3 .breadcrumbs-area2 .breadcrumbs-content ul li a:hover,
.breadcrumbs-area2 .breadcrumbs-content h3 a:hover,
.post-detail-style3 .post-3-no-img-meta ul.post-info-light li a:hover,
.post-detail-style3 .entry-meta li a:hover,
.sidebar-widget-area .widget .corporate-address li i,
.sidebar-widget-area .widget .corporate-address li i.fa-map-marker,
.rt-news-box .post-cat span a:hover,
.rt-news-box .topic-box .post-date1 span a:hover,
.rt_widget_recent_entries_with_image .topic-box .post-date1 span a:hover,
.sidebar-widget-area .widget.title-style-1 h3.widgettitle,
.rt_widget_recent_entries_with_image .topic-box .widget-recent-post-title a:hover,
.search-form input.search-submit,
.header-style-5.trheader .header-social li a:hover,
.header-style-5 .header-social li a:hover,
.header-style-5 .header-contact .fa,
.header-style-4.trheader .header-social li a:hover,
.header-style-4 .header-social li a:hover,
.header-style-4 .header-contact .fa,
.header-style-3.trheader .header-social li a:hover,
.header-style-3.trheader.non-stickh .header-social li a:hover,
.header-style-3 .header-contact .fa,
ul.news-info-list li i,
.about-author .media-body .author-title a:hover,
.header-style-2 .header-contact .fa,
.search-form input.search-submit:hover,
.rt-cat-list-widget li:hover a,
.footer-top-area .widget_archive li a:before,
.footer-top-area .widget_tag_cloud a:hover,
.footer-top-area .search-form input.search-submit,
.ui-cat-tag a:hover,
.entry-post-meta .post-author a:hover,
.post-detail-style2 .post-info-light ul li a:hover,
.post-detail-style2 .entry-meta li a:hover,
.entry-title a:hover,
.comments-area .main-comments .comment-meta .comment-author-name a:hover,
.rt-blog-layout .entry-thumbnail-area ul li i,
.rt-blog-layout .entry-thumbnail-area ul li a:hover,
.rt-blog-layout .entry-content h3 a:hover,
.blog-layout-1 .entry-meta ul li a:hover,
.blog-box .blog-bottom-content-holder ul li i,
.footer-top-area .rt-news-box .dark .rt-news-box-widget .media-body a:hover,
.entry-footer .share-social ul a:hover
 {
	color: <?php echo esc_html( $primary_color );?>;
}
.rt-box-title-2,.blog-box .blog-img-holder .entry-content,
button, input[type="button"], input[type="reset"], input[type="submit"],
.sidebar-widget-area .widget.title-style-1 h3.widgettitle, 
.rt-cat-list-widget li:before, 
.elementor-widget-wp-widget-categories ul li:before, 
.cat-holder-text, 
.rt-blog-layout .entry-thumbnail-area ul .active, 
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li .current, 
.pagination-area ul li .current, 
.woocommerce nav.woocommerce-pagination ul li.active a,
.blog-layout-2 .entry-meta .blog-cat ul li a:hover,
.blog-layout-3 .entry-meta ul li.blog-cat li a:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.post-detail-style2 .cat-holder:before {
    border-top: 8px solid <?php echo esc_html( $primary_color );?>;
}
.footer-top-area .widget_tag_cloud a:hover {
	background-color: <?php echo esc_html( $primary_color );?> !important;
	border: 1px solid <?php echo esc_html( $primary_color );?> !important;
}
.entry-content .wpb_layerslider_element a.layerslider-button, 
.comments-area h3.comment-num:after {	
	background: <?php echo esc_html( $primary_color );?>; 
}
.entry-content .btn-read-more-h-b, .pagination-area ul li span 
.header-style-10.trheader #tophead .tophead-social li a:hover {
    border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.woocommerce nav.woocommerce-pagination ul li span {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce nav.woocommerce-pagination ul li .current,
.woocommerce nav.woocommerce-pagination ul li a:hover {
    background-color: <?php echo esc_html( $primary_color );?> !important;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li a:after {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce div.product .share-links a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.footer-top-area .widget_archive li {
	border-bottom: 1px dotted <?php echo esc_html( $primary_color );?>;
}
.bottomBorder {
    border-bottom: 2px solid <?php echo esc_html( $primary_color ); ?>;
}
.search-form input.search-field, #respond form textarea:focus {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.search-form input.search-submit  {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget.title-style-1 h3.widgettitle span {
	border-top: 10px solid <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget_tag_cloud a:hover,
.sidebar-widget-area .widget_product_tag_cloud a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.cat-holder:before {
    border-top: 8px solid <?php echo esc_html( $primary_color ); ?>;
}
.footer-bottom-social ul li a {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-bottom-social ul li a:hover {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
