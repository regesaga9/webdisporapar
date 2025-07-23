<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 

function blogxer_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	} 
}

add_action( 'wp_enqueue_scripts','blogxer_enqueue_high_priority_scripts', 1500 );
function blogxer_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', BLOGXER_CSS_URL . 'rtl.css', array(), BLOGXER_VERSION );
	}
}

add_action( 'wp_enqueue_scripts', 'blogxer_register_scripts', 12 );
if ( !function_exists( 'blogxer_register_scripts' ) ) {
	function blogxer_register_scripts(){
		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       BLOGXER_CSS_URL . 'owl.carousel.min.css', array(), BLOGXER_VERSION );
		wp_register_style( 'owl-theme-default',  BLOGXER_CSS_URL . 'owl.theme.default.min.css', array(), BLOGXER_VERSION );		
		wp_register_style( 'magnific-popup',     BLOGXER_CSS_URL . 'magnific-popup.css', array(), BLOGXER_VERSION );
		// Slider
		wp_register_style( 'nivo-slider',        BLOGXER_CSS_URL . 'nivo-slider.min.css', array(), BLOGXER_VERSION );
		// Swiper CSS
		wp_register_style( 'swiper-slider',      BLOGXER_CSS_URL . 'swiper.min.css', array(), BLOGXER_VERSION );
		wp_register_style( 'multiscroll',        BLOGXER_CSS_URL . 'jquery.multiscroll.min.css', array(), BLOGXER_VERSION );
		wp_register_style( 'animate',        	 BLOGXER_CSS_URL . 'animate.min.css', array(), BLOGXER_VERSION );
		
		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      BLOGXER_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// Slider
		wp_register_script( 'nivo-slider',       BLOGXER_JS_URL . 'jquery.nivo.slider.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		
		// Slick js
		wp_register_script( 'imagesloaded',      BLOGXER_JS_URL . 'imagesloaded.pkgd.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		
		// counter js
		wp_register_script( 'rt-waypoints',      BLOGXER_JS_URL . 'waypoints.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		wp_register_script( 'counterup',         BLOGXER_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		wp_register_script( 'knob',         	 BLOGXER_JS_URL . 'jquery.knob.js', array( 'jquery' ), BLOGXER_VERSION, true );
		wp_register_script( 'appear',         	 BLOGXER_JS_URL . 'jquery.appear.js', array( 'jquery' ), BLOGXER_VERSION, true );
		
		// magnific popup
		wp_register_script( 'magnific-popup',    BLOGXER_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// rt-canvas-menu
		wp_register_style( 'rt-canvas-menu',     BLOGXER_CSS_URL . 'rt-canvas-menu.css', '', BLOGXER_VERSION );
		wp_register_script( 'rt-canvas-menu',    BLOGXER_JS_URL . 'rt-canvas-menu.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// theia sticky
		wp_register_script( 'theia-sticky',    	 BLOGXER_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// Swiper Slider
		wp_register_script( 'swiper-slider',     BLOGXER_JS_URL . 'swiper.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		wp_register_script( 'isotope-pkgd',      BLOGXER_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'blogxer_enqueue_scripts', 15 );
if ( !function_exists( 'blogxer_enqueue_scripts' ) ) {
	function blogxer_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'blogxer-gfonts', 		BlogxerTheme_Helper::fonts_url(), array(), BLOGXER_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			    BLOGXER_CSS_URL . 'bootstrap.min.css', array(), BLOGXER_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-blogxer',      BLOGXER_ASSETS_URL . 'fonts/flaticon-blogxer/flaticon.css', array(), BLOGXER_VERSION );
		
		elementor_scripts();
		wp_dequeue_style( 'fontawesome-css' );
		wp_enqueue_style( 'nivo-slider' );
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       BLOGXER_CSS_URL . 'font-awesome.min.css', array(), BLOGXER_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            BLOGXER_CSS_URL . 'animate.min.css', array(), BLOGXER_VERSION );	
		// Select 2 CSS
		wp_enqueue_style( 'select2',            BLOGXER_CSS_URL . 'select2.min.css', array(), BLOGXER_VERSION );		
		// Meanmenu CSS // @rtl
		wp_enqueue_style( 'meanmenu',     		 BLOGXER_CSS_URL . 'meanmenu.css', array(), BLOGXER_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'blogxer-default',    	 BLOGXER_CSS_URL . 'default.css', array(), BLOGXER_VERSION );
		// vc modules css
		wp_enqueue_style( 'blogxer-elementor',     BLOGXER_CSS_URL . 'elementor.css', array(), BLOGXER_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'blogxer-style',     	 blogxer_get_maybe_rtl( 'style.css' ), array(), BLOGXER_VERSION );
		
		// Template Style
		wp_add_inline_style( 'blogxer-style',   	blogxer_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'popper',            BLOGXER_JS_URL . 'popper.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         BLOGXER_JS_URL . 'bootstrap.min.js', array( 'jquery' ), BLOGXER_VERSION, true );		
		// smoothscroll js
		wp_enqueue_script( 'smoothscroll',     	 BLOGXER_JS_URL . 'jquery.smoothscroll.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Select2 js
		wp_enqueue_script( 'select2', BLOGXER_JS_URL . 'select2.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// Meanmenu js
		wp_enqueue_script( 'jquery-meanmenu', 	BLOGXER_JS_URL . 'jquery.meanmenu.min.js', array( 'jquery' ), BLOGXER_VERSION, true );		
		// Nav smooth scroll
		wp_enqueue_script( 'jquery-nav',      	BLOGXER_JS_URL . 'jquery.nav.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// Countdown
		wp_enqueue_script( 'countdown',      	BLOGXER_JS_URL . 'jquery.countdown.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'cookie',       		BLOGXER_JS_URL . 'js.cookie.min.js', array( 'jquery' ), BLOGXER_VERSION, true );
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_script( 'rt-canvas-menu' );
		wp_enqueue_style( 'rt-canvas-menu' );
		wp_enqueue_script( 'theia-sticky' );
		
		if ( is_singular() ) {
			wp_enqueue_style( 'swiper-slider' );
			wp_enqueue_script( 'swiper-slider' );		
		}
		
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'blogxer-main',    	BLOGXER_JS_URL . 'main.js', $dep , BLOGXER_VERSION, true );
		if ( !empty( BlogxerTheme::$options['logo']['url'] ) ) {
			$logo = '<img class="logo-small" src="'. esc_url( empty( BlogxerTheme::$options['logo']['url'] ) ? BLOGXER_IMG_URL . 'logo.png' : BlogxerTheme::$options['logo']['url'] ).'" />';
		} else {
			$logo = esc_attr( get_bloginfo( 'title' ) );
		}		
		
		// localize script
		$blogxer_localize_data = array(
			'stickyMenu' 	=> BlogxerTheme::$options['sticky_menu'],
			'meanWidth'  	=> BlogxerTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . esc_html ( $logo ) . '</a>',
			'day'	     => esc_html__('Day' , 'blogxer'),
			'hour'	     => esc_html__('Hour' , 'blogxer'),
			'minute'     => esc_html__('Minute' , 'blogxer'),
			'second'     => esc_html__('Second' , 'blogxer'),
			'extraOffset' => BlogxerTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => BlogxerTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'yes':'no',
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'blogxer-nonce' )
		);
		wp_localize_script( 'blogxer-main', 'ThemeObj', $blogxer_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		 // do stuff for preview
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
	} 
}

add_action( 'wp_enqueue_scripts', 'blogxer_high_priority_scripts', 1500 );
if ( !function_exists( 'blogxer_high_priority_scripts' ) ) {
	function blogxer_high_priority_scripts() {
		// Dynamic style
		BlogxerTheme_Helper::dynamic_internal_style();
	}
}

function blogxer_template_style(){
	ob_start();
	?>
	.entry-banner {
		<?php if ( BlogxerTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( BlogxerTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( BlogxerTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}
	.content-area {
		padding-top: <?php echo esc_html( BlogxerTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( BlogxerTheme::$padding_bottom );?>px;
	}
	#page {
		background-image: url( <?php echo BlogxerTheme::$pagebgimg; ?> );
		<!-- background-color: <?php //echo BlogxerTheme::$pagebgcolor; ?>; -->
	}
	.single-blogxer_team #page {
		background-image: none;
		background-color: transparent;
	}
	.single-blogxer_team .site-main {
		background-image: url( <?php echo BlogxerTheme::$pagebgimg; ?> );
		background-color: <?php echo BlogxerTheme::$pagebgcolor; ?>;
	}
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_1() {
	wp_enqueue_style( 'blogxer-gfonts', BlogxerTheme_Helper::fonts_url(), array(), BLOGXER_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       BLOGXER_CSS_URL . 'font-awesome.min.css', array(), BLOGXER_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_1', 1 );

function load_custom_wp_admin_script() {
	if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }
	wp_register_script( 'blogxer-admin-js', BLOGXER_JS_URL . 'rt-widget-color.js', false, BLOGXER_VERSION, true );
	wp_register_style( 'blogxer-admin-css', BLOGXER_CSS_URL . 'admin-style.css', false, BLOGXER_VERSION, true );
	wp_enqueue_style( 'blogxer-admin-css' );
	wp_enqueue_script( 'blogxer-admin-js' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script', 20 );