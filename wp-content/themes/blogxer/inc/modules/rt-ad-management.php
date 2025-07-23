<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class Ad_Management {

	public function __construct() {
		// Common
		add_action( 'blogxer_header_top',     array( $this, 'header_top' ) );
		add_action( 'blogxer_header_below',   array( $this, 'header_below' ) );
		add_action( 'blogxer_before_footer',  array( $this, 'footer' ) );
		add_action( 'blogxer_before_content', array( $this, 'before_content' ) );
		add_action( 'blogxer_after_content',  array( $this, 'after_content' ) );
		
	}

	public function header_top() {
		
		switch ( $this->get_page_type() ) {
			case 'blog':
			$this->render_ad( 'ad_blog_header', 'ad-header-top' );
			break;
			case 'post':
			$this->render_ad( 'ad_post_header', 'ad-header-top' );
			break;
			case 'page':
			$this->render_ad( 'ad_page_header', 'ad-header-top' );
			break;
		}
	}
	
	public function header_below() {
		
		switch ( $this->get_page_type() ) {
			case 'blog':
			$this->render_ad( 'ad_blog_header_below', 'ad-header-below' );
			break;
			case 'post':
			$this->render_ad( 'ad_post_header_below', 'ad-header-below' );
			break;
			case 'page':
			$this->render_ad( 'ad_page_header_below', 'ad-header-below' );
			break;
		}
	}

	public function footer() {
		switch ( $this->get_page_type() ) {
			case 'blog':
			$this->render_ad( 'ad_blog_footer', 'ad-footer container' );
			break;
			case 'post':
			$this->render_ad( 'ad_post_footer', 'ad-footer container' );
			break;
			case 'page':
			$this->render_ad( 'ad_page_footer', 'ad-footer container' );
			break;
		}
	}

	public function before_content() {
		switch ( $this->get_page_type() ) {
			case 'post':
			$this->render_ad( 'ad_post_before_content', 'ad-before-content' );
			break;
			case 'page':
			$this->render_ad( 'ad_page_before_content', 'ad-before-content' );
			break;
		}
	}

	public function after_content() {
		switch ( $this->get_page_type() ) {
			case 'post':
			$this->render_ad( 'ad_post_after_content', 'ad-after-content' );
			break;
			case 'page':
			$this->render_ad( 'ad_page_after_content', 'ad-after-content' );
			break;
		}		
	}

	private function render_ad( $prefix, $class='' ) {

		if ( !BlogxerTheme::$options[$prefix.'_activate'] ) {
			return;
		}

		if ( BlogxerTheme::$options[$prefix.'_type'] == 'image' ) {
			$html = $this->get_image_ad( $prefix );
		}
		else {
			$html = BlogxerTheme::$options[$prefix.'_code'];
		}

		if ( !$html ) {
			return;
		}

		$html = sprintf( '<div class="blogxer-ad %1$s">%2$s</div>' , $class, $html );
		echo do_shortcode( $html );
	}

	private function get_page_type(){
		if ( is_home() || is_archive() ) {
			return 'blog';
		}
		if ( is_singular( 'post' ) ) {
			return 'post';
		}
		if ( is_page() ) {
			return 'page';
		}
		return '';
	}

	private function get_image_ad( $prefix ){
		if ( empty( BlogxerTheme::$options[$prefix.'_image']['id'] ) ) {
			return;
		}

		$img_html = wp_get_attachment_image( BlogxerTheme::$options[$prefix.'_image']['id'], 'full' );

		if ( !$img_html ) {
			return;
		}

		if ( !BlogxerTheme::$options[$prefix.'_url'] ) {
			$html = $img_html;
		}
		else {
			$attr = ' href="'.BlogxerTheme::$options[$prefix.'_url'].'"';
			if ( BlogxerTheme::$options[$prefix.'_newtab'] ) {
				$attr .= ' target="_blank"';
			}
			if ( BlogxerTheme::$options[$prefix.'_nofollow'] ) {
				$attr .= ' rel="nofollow"';
			}
			$html = sprintf( '<a%1$s>%2$s</a>' , $attr, $img_html );
		}

		return $html;
	}
}

new Ad_Management;