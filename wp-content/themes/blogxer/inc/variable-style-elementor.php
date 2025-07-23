<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color     = BlogxerTheme::$options['primary_color']; // #444444
$primary_rgb       = BlogxerTheme_Helper::hex2rgb( $primary_color ); // 68, 68, 68
$secondary_color   = BlogxerTheme::$options['secondary_color']; // #646464
$secondary_rgb     = BlogxerTheme_Helper::hex2rgb( $secondary_color ); // 100, 100, 100

/*---------------------------------    
INDEX
===================================
#. Button
#. Section Title
#. Slider
#. Owl Nav 1
#. Owl Nav 2
#. About
#. Text With Button
#. Post Grid
#. Post List
#. Post Box
#. Post Single
#. Post Slider
#. Info Text
#. CTA
#. Counter
#. Widget
#. Others
----------------------------------*/

/*-----------------------
#. Button
------------------------*/
?>
.entry-content .light-button ,
.entry-content .light-button i,
.entry-content a.grid-fill-btn:hover,
.entry-content .rt-grid-fill-btn a.grid-fill-btn:hover,
.entry-content .rt-text-with-btn a.light-box:hover {
	color: <?php echo esc_html($primary_color); ?> !important;
}
.multiscroll-wrapper .ms-left .left-slide .item-btn,
.title-text-button .rtin-dark .blogxer-button:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.entry-content a.grid-fill-btn,
.entry-content .rt-grid-fill-btn a.grid-fill-btn,
.dark-button {
	border-color: <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rt-text-with-btn a.light-box,
.multiscroll-wrapper .ms-left .left-slide .item-btn:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .rtin-dark .blogxer-button {
	border-color: <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
.ig-block .instagallery-actions .igact-instalink {
    background: <?php echo esc_html($primary_color); ?> !important;
}
.ig-block .instagallery-actions .igact-instalink:hover {
    background: <?php echo esc_html($secondary_color); ?> !important;
}
.multiscroll-wrapper .ms-left .left-slide1 .item-btn {
	border-color: <?php echo esc_html($primary_color); ?>;
}
.multiscroll-wrapper .ms-left .left-slide1 .item-btn:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-box .rtin-dark .blogxer-button {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rtin-contact-box .rtin-dark .blogxer-button:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-box .rtin-light .blogxer-button:hover {
    background: <?php echo esc_html($secondary_color); ?>;
}

<?php
/*-----------------------
#. Section Title
------------------------*/
?>
.rt-vc-title-1 h2::after,
.rt-vc-title h2:after ,
.section-title h2:after,
.sec-title.style2 .rtin-title:before,
.sec-title.style2 .rtin-title:after {
	background: <?php echo esc_html($primary_color); ?>;
}
.sec-title.style2 .section-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. Slider
------------------------*/
?>
.slider-left-side-content .side-content,
.slider-right-side-content ul.footer-social li a,
.multiscroll-wrapper .ms-social-link li a,
.fullpage-wrapper .fullpage-scroll-content .item-btn:hover,
.multiscroll-wrapper .ms-copyright a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.multiscroll-wrapper .ms-social-link li a:hover,
.slider-right-side-content ul.footer-social li a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.fps-menu-list li.active a,
.ms-menu-list li a {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. About
------------------------*/
?>
.title-text-button .rtin-light .blogxer-button {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Owl Nav 1
---------------------------------------*/
?>
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dots .owl-dot:hover span,
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dots .owl-dot.active span {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($primary_color); ?>;
}

<?php
/*-------------------------------------
#. Owl Nav 2
---------------------------------------*/
?>
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot:hover span ,
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot.active span {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Post Grid
---------------------------------------*/
?>
.post-grid-default .rtin-single-post .rtin-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-grid-default .post-footer ul li i,
.post-grid-default .rtin-single-post .post-meta ul li i,
.post-grid-default .rtin-single-post .post-meta ul li a:hover,
.post-grid-default .post-footer ul li a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Post List
---------------------------------------*/
?>
.post-list-default .rtin-single-post .rtin-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-list-default .post-meta ul li i,
.post-list-default .post-footer ul li i,
.post-list-default .post-meta ul li a:hover,
.post-list-default .post-footer ul li a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Post Box
---------------------------------------*/
?>
<?php if ( '#444444' == $primary_color ) { ?>
	.entry-content .post-box-default a.item-btn {
		color: #ffffff;	
	}
	.post-box-default .rtin-single-post .post-meta ul li i,
	.post-box-default .post-footer ul li i {
		color: #ffffff;	
	} 
<?php } else { ?>
	.entry-content .post-box-default a.item-btn,
	.post-box-default .rtin-single-post .post-meta ul li i,
	.post-box-default .post-footer ul li i {
		color: <?php echo esc_html($primary_color); ?>;	
	}	
<?php } ?>
<?php if ( '#646464' == $secondary_color ) { ?>
	.post-box-default .rtin-single-post .post-meta ul li a:hover,
	.post-box-default .rtin-single-post .rtin-content h3 a:hover,
	.post-box-default .post-footer ul li a:hover {
		color: #e6e6e6;
	}
<?php } else { ?>
	.post-box-default .rtin-single-post .post-meta ul li a:hover,
	.post-box-default .rtin-single-post .rtin-content h3 a:hover,
	.post-box-default .post-footer ul li a:hover {
		color: <?php echo esc_html($secondary_color); ?>;	
	}	
<?php } ?>

<?php
/*-------------------------------------
#. Post Single
---------------------------------------*/
?>
.post-single-default .rtin-single-post .rtin-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-single-default .post-footer ul li i,
.post-single-default .rtin-single-post .post-meta ul li i,
.post-single-default .rtin-single-post .post-meta ul li a:hover,
.post-single-default .post-footer ul li a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Post Slider
---------------------------------------*/
?>
.post-slider-default .rtin-single-post .rtin-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-slider-default .post-meta ul li i,
.post-slider-default .post-meta ul li a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Info Text
---------------------------------------*/
?>
.info-style1 .item-sl .rtin-item-title a:hover,
.info-style2 .rtin-item .rtin-item-title a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-address ul li a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
.info-style4 .rtin-image .rtin-media .rtin-item-title a i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.info-box .rtin-item-title a:hover {
	color: <?php echo esc_html($primary_color); ?> !important;
}
.info-style4.info-box .rtin-item-title a:hover {
	color: <?php echo esc_html($secondary_color); ?> !important;
}
<?php
/*-----------------------
#. CTA
------------------------*/
?>
.rt-text-advertise h2 span,
.rt-cta-1 .rtin-cta-contact-button a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-cta-2 .rtin-cta-right:before ,
.rt-cta-2 .rtin-cta-right {	
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. Widget
--------------------------------*/
?>
.elementor-widget-wp-widget-categories ul li:hover a,
.fixed-sidebar-left .elementor-widget-wp-widget-nav_menu ul > li > a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.fix-bar-bottom-copyright .rt-about-widget ul li a:hover, 
.fixed-sidebar-left .rt-about-widget ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.barshow .title-bar,
.about-info-text h2:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*------------------------------
#. Others
--------------------------------*/
?>
.fixed-sidebar-addon .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fixed-sidebar-addon .rt-about-widget .footer-social li a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-cat-list-widget li:before,
.rtin-faq .faq-item .faq-number span{
    background: <?php echo esc_html( $primary_color );?>;
}