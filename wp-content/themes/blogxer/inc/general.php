<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'blogxer_setup');
if ( !function_exists( 'blogxer_setup' ) ) {
	function blogxer_setup() {
		// Language
		load_theme_textdomain( 'blogxer', BLOGXER_BASE_DIR . 'languages' );

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );
		add_theme_support( 'woocommerce' );
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'strong magenta', 'blogxer' ),
				'slug' => 'strong-magenta',
				'color' => '#a156b4',
			),
			array(
				'name' => __( 'light grayish magenta', 'blogxer' ),
				'slug' => 'light-grayish-magenta',
				'color' => '#d0a5db',
			),
			array(
				'name' => __( 'very light gray', 'blogxer' ),
				'slug' => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name' => __( 'very dark gray', 'blogxer' ),
				'slug' => 'very-dark-gray',
				'color' => '#444',
			),
		) );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => __( 'Small', 'blogxer' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => __( 'Normal', 'blogxer' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => __( 'Large', 'blogxer' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => __( 'Huge', 'blogxer' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support('editor-styles');	
		remove_theme_support( 'widgets-block-editor' );
		
		// Image sizes
		add_image_size( 'blogxer-size1', 1210, 700, true );   	// Single Post
		add_image_size( 'blogxer-size2', 900, 500, true );    	// Blog layout 3
		add_image_size( 'blogxer-size3', 450, 330, true );    	// Blog layout 1
		add_image_size( 'blogxer-size4', 375, 340, true );    	// Blog layout 2
		add_image_size( 'blogxer-size5', 850, 702, true );    	// Post Slider 6, Post Box 4
		add_image_size( 'blogxer-size6', 425, 710, true );    	// Post Box 4
		
		//PARVEZ
		add_image_size( 'blogxer-size8', 590, 582, true ); 		// Post grid 3, Post list 3
		add_image_size( 'blogxer-size9', 630, 517, true ); 		// Blog layout 2, Post Slider 5
		add_image_size( 'blogxer-size10', 400, 400, true );
		
		add_image_size( 'blogxer-size11', 800, 457, true );  	// Post Box 1
		add_image_size( 'blogxer-size12', 400, 476, true );  	// Post Box 1
		add_image_size( 'blogxer-size13', 650, 867, true );  	// Post Slider 4
		add_image_size( 'blogxer-size14', 630, 650, true );  	// Post Slider 3
		
		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'blogxer' ),
			'topright' => esc_html__( 'Header Right', 'blogxer' ),
		) );		
	}
}

function blogxer_theme_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}
add_action( 'admin_init', 'blogxer_theme_add_editor_styles' );

function blogxer_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blogxer_pingback_header' );

// Initialize Widgets
add_action( 'widgets_init', 'blogxer_widgets_register' );
if ( !function_exists( 'blogxer_widgets_register' ) ) {
	function blogxer_widgets_register() {
		
		$footer_widget_titles2 = array(
			'1' => esc_html__( 'Footer (Style 2) 1', 'blogxer' ),
			'2' => esc_html__( 'Footer (Style 2) 2', 'blogxer' ),
			'3' => esc_html__( 'Footer (Style 2) 3', 'blogxer' ),
			'4' => esc_html__( 'Footer (Style 2) 4', 'blogxer' ),
		);		
		$footer_widget_titles4 = array(
			'1' => esc_html__( 'Footer (Style 4) 1', 'blogxer' ),
			'2' => esc_html__( 'Footer (Style 4) 2', 'blogxer' ),
			'3' => esc_html__( 'Footer (Style 4) 3', 'blogxer' ),
			'4' => esc_html__( 'Footer (Style 4) 4', 'blogxer' ),
		);		
		$footer_widget_titles5 = array(
			'1' => esc_html__( 'Footer (style 5) 1', 'blogxer' ),
			'2' => esc_html__( 'Footer (style 5) 2', 'blogxer' ),
			'3' => esc_html__( 'Footer (style 5) 3', 'blogxer' ),
			'4' => esc_html__( 'Footer (style 5) 4', 'blogxer' ),
		);

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'blogxer' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="rt-widget-title-holder"><h3 class="widgettitle">',
			'after_title'   => '<span class="titleinner"></span></h3></div>',
			) );
		
		if ( class_exists( 'WooCommerce' ) ) {			
			register_sidebar( array(
				'name'          => 'Shop Sidebar',
				'id'            => 'shop-sidebar-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar 4 - Left', 'blogxer' ),
			'id'            => 'top4-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Bar 4 - Right', 'blogxer' ),
			'id'            => 'top4-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="hidden">',
			'after_title'   => '</h3>',
		) );		
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 1', 'blogxer' ),
			'id'            => 'footer-style-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. BlogxerTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		
		if ( !empty(BlogxerTheme::$options['footer_column_2']) ){
			$item_widget = BlogxerTheme::$options['footer_column_2'];
		} else {
			$item_widget = 3;
		}		
		for ( $i = 1; $i <= $item_widget; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles2[$i],
				'id'            => 'footer-style-2-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle '. BlogxerTheme::$footer_style .'">',
				'after_title'   => '</h3>',
			) );
		}
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 3', 'blogxer' ),
			'id'            => 'footer-style-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. BlogxerTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 4', 'blogxer' ),
			'id'            => 'footer-style-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. BlogxerTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Style 5', 'blogxer' ),
			'id'            => 'footer-style-5',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle '. BlogxerTheme::$footer_style .'">',
			'after_title'   => '</h3>',
		) );
		
	}
}

// Head Script
add_action( 'wp_head', 'blogxer_head', 1 );
if( !function_exists( 'blogxer_head' ) ) {
	function blogxer_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}

// Footer Html
add_action( 'wp_footer', 'blogxer_footer_html', 1 );
if( !function_exists( 'blogxer_footer_html' ) ) {
	function blogxer_footer_html(){
		// Back-to-top link
		if ( BlogxerTheme::$options['back_to_top'] ){
			echo '<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>';
		}
	}	
}

// advanced search functionality
function advanced_search_query($query) {

    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['category']) )
            ));
        }    
    }
    return $query;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

/*social link to author profile page*/
add_action( 'show_user_profile', 'blogxer_user_social_profile_fields' );
add_action( 'edit_user_profile', 'blogxer_user_social_profile_fields' );

function blogxer_user_social_profile_fields( $user ) { ?>

	<h3><?php esc_html_e( 'User Designation' , 'blogxer' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="blogxer_author_designation"><?php esc_html_e( 'Author Designation' , 'blogxer' ); ?></label></th>
			<td><input type="text" name="blogxer_author_designation" id="blogxer_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'blogxer_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'blogxer' ); ?></span></td>
		</tr>
	</table>
	
	<h3><?php esc_html_e( 'Social profile information' , 'blogxer' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'blogxer' ); ?></label></th>
			<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'blogxer_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'blogxer' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'blogxer' ); ?></label></th>
			<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'blogxer_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'blogxer' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'blogxer' ); ?></label></th>
			<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'blogxer_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'blogxer' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="gplus"><?php esc_html_e( 'Google+' , 'blogxer' ); ?></label></th>
			<td><input type="text" name="gplus" id="gplus" value="<?php echo esc_attr( get_the_author_meta( 'blogxer_gplus', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your google+ Profile' , 'blogxer' ); ?></span></td>
		</tr>
		<tr>
			<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'blogxer' ); ?></label></th>
			<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'blogxer_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'blogxer' ); ?></span></td>
		</tr>
	</table>
<?php }

add_action( 'personal_options_update', 'blogxer_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'blogxer_extra_profile_fields' );

function blogxer_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'blogxer_facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'blogxer_twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'blogxer_linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'blogxer_gplus', $_POST['gplus'] );
	update_user_meta( $user_id, 'blogxer_pinterest', $_POST['pinterest'] );
	update_user_meta( $user_id, 'blogxer_author_designation', $_POST['blogxer_author_designation'] );
}

/*find newest post/product with time*/
function blogxer_is_new( $id ) {
	$now    = time();
	$published_date = get_post_time('U');
	$diff =  $now - $published_date;
	if ( $diff < 604800 ) { ?>
		<span class="new-post"><?php esc_html_e( 'New' , 'blogxer' ); ?></span>
	<?php }
}

if( ! function_exists( 'blogxer_post_img_src' )){
	function blogxer_post_img_src( $size = 'blogxer-size1' ){
		$post_id  = get_the_ID();
		$image_id = get_post_thumbnail_id( $post_id );
		$image    = wp_get_attachment_image_src( $image_id, $size );
		return $image[0];
	}
}

/*Post Time & time format*/
if( ! function_exists( 'blogxer_get_time' )){

	function blogxer_get_time( $return = false ){

		$post = get_post();
		
		# Date is disabled globally ----------
		if( BlogxerTheme::$options['time_format'] == 'none' ){
			return false;
		}
		# Human Readable Post Dates ----------
		elseif(  BlogxerTheme::$options['time_format'] == 'modern' ){

			$time_now  = current_time( 'timestamp' );
			$post_time = get_the_time( 'U' ) ;
			$since = sprintf( esc_html__( '%s ago' , 'blogxer' ), human_time_diff( $post_time, $time_now ) );			
		}
		else{
			$since = get_the_date();
		}

		$post_time = '<span class="date meta-item"><span class="fa fa-clock-o" aria-hidden="true"></span>  <span>'.$since.'</span></span>';

		if( $return ){
			return $post_time;
		}

		echo wp_kses_post( $post_time );
	}

}

function widgets_scripts( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
	
}
add_action( 'admin_enqueue_scripts', 'widgets_scripts' );

/*Module: Last Post update Date*/
function blogxer_last_update() { 

	$lastupdated_args = array(
		'orderby' => 'modified',
		'posts_per_page' => 1,
		'ignore_sticky_posts' => '1'
	);
 
	$lastupdated_loop = new WP_Query( $lastupdated_args );
	
	while( $lastupdated_loop->have_posts() )  {
		$lastupdated_loop->the_post();
		echo get_the_modified_date( 'M j, Y g:i a' );
	}	
	wp_reset_postdata();
}

/*
* for most use of the get_term cached 
* This is because all time it hits and single page provide data quickly
*/
function get_img( $img ){
	$img = get_stylesheet_directory_uri() . '/assets/img/' . $img;
	return $img;
}
function get_css( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/css/' . $file . '.css';
	return $file;
}
function get_js( $file ){
	$file = get_stylesheet_directory_uri() . '/assets/js/' . $file . '.js';
	return $file;
}
function filter_content( $content ){
	// wp filters
	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = convert_chars( $content );
	$content = wpautop( $content );
	$content = shortcode_unautop( $content );

	// remove shortcodes
	$pattern= '/\[(.+?)\]/';
	$content = preg_replace( $pattern,'',$content );

	// remove tags
	$content = strip_tags( $content );

	return $content;
}

function get_current_post_content( $post = false ) {
	if ( !$post ) {
		$post = get_post();				
	}
	$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
	$content = filter_content( $content );
	return $content;
}

function cached_get_term_by( $field, $value, $taxonomy, $output = OBJECT, $filter = 'raw' ){
	// ID lookups are cached
	if ( 'id' == $field )
		return get_term_by( $field, $value, $taxonomy, $output, $filter );

	$cache_key = $field . '|' . $taxonomy . '|' . md5( $value );
	$term_id = wp_cache_get( $cache_key, 'get_term_by' );

	if ( false === $term_id ){
		$term = get_term_by( $field, $value, $taxonomy );
		if ( $term && ! is_wp_error( $term ) )
			wp_cache_set( $cache_key, $term->term_id, 'get_term_by' );
		else
			wp_cache_set( $cache_key, 0, 'get_term_by' ); // if we get an invalid value, let's cache it anyway
	} else {
		$term = get_term( $term_id, $taxonomy, $output, $filter );
	}

	if ( is_wp_error( $term ) )
		$term = false;

	return $term;
}

/*for avobe reason*/
function cached_get_term_link( $term, $taxonomy = null ){
	// ID- or object-based lookups already result in cached lookups, so we can ignore those.
	if ( is_numeric( $term ) || is_object( $term ) ){
		return get_term_link( $term, $taxonomy );
	}

	$term_object = cached_get_term_by( 'slug', $term, $taxonomy );
	return get_term_link( $term_object );
}


/*only to show the first category in the post - primary category*/
function blogxer_if_term_exists( $term, $taxonomy = '', $parent = null ){
	if ( null !== $parent ){
		return term_exists( $term, $taxonomy, $parent );
	}

	if ( ! empty( $taxonomy ) ){
		$cache_key = $term . '|' . $taxonomy;
	}else{
		$cache_key = $term;
	}

	$cache_value = wp_cache_get( $cache_key, 'term_exists' );

	//term_exists frequently returns null, but (happily) never false
	if ( false  === $cache_value ){
		$term_exists = term_exists( $term, $taxonomy );
		wp_cache_set( $cache_key, $term_exists, 'term_exists' );
	}else{
		$term_exists = $cache_value;
	}

	if ( is_wp_error( $term_exists ) )
		$term_exists = null;

	return $term_exists;
}


if( ! function_exists( 'blogxer_get_primary_category' )){

	function blogxer_get_primary_category() {

		if( get_post_type() != 'post' ) {
			return;
		}

		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}
}

/*only to show the first category in the post - primary category ID*/
if( ! function_exists( 'blogxer_get_primary_category_id' )){

	function blogxer_get_primary_category_id(){

		$primary_category = blogxer_get_primary_category();

		if( ! empty( $primary_category[0]->term_id )){
			return $primary_category[0]->term_id;
		}

		return false;
	}
}

//find the post type function 
if ( ! function_exists ( 'blogxer_post_type' ) ) {
	function blogxer_post_type() {
		$blogxer_post_type_var =get_post_type( get_the_ID());
		echo esc_html( $blogxer_post_type_var );
	}
}

/*next previous post links*/
if ( !function_exists( 'blogxer_post_links_next_prev' ) ) {
	function blogxer_post_links_next_prev() { ?>
	<div class="row no-gutters divider post-navigation">
		<?php if ( !empty( get_previous_post_link())){ ?>
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 <?php if ( is_rtl() ){ echo esc_attr( 'text-right' ); } else { echo esc_attr( 'text-left' ); } ?>">
			<span class="prev-article">
			<i class="fa fa-angle-<?php if ( is_rtl() ){ echo esc_attr( 'right' ); } else { echo esc_attr( 'left' ); } ?>" aria-hidden="true"></i><?php previous_post_link( '%link', esc_html__('Previous article' , 'blogxer' ) );?></span>
			<?php previous_post_link('<h3 class="post-nav-title">%link</h3>'); ?>
			</div>
		<?php } ?>
		<?php if ( !empty( get_next_post_link())){ ?>
			<div class=" col-lg-6 col-md-6 col-sm-6 col-6 <?php if ( empty( get_previous_post_link())){ ?>offset-md-6<?php } ?> <?php if ( is_rtl() ){ echo esc_attr( 'text-left' ); } else { echo esc_attr( 'text-right' ); } ?>">
			<span class="next-article">
			<?php next_post_link( '%link', esc_html__( 'Next article' , 'blogxer' ) );?><i class="fa fa-angle-<?php if ( is_rtl() ){ echo esc_attr( 'left' ); } else { echo esc_attr( 'right' ); } ?>" aria-hidden="true"></i></span>
			<?php next_post_link( '<h3 class="post-nav-title">%link</h3>' ); ?>
			</div>
		<?php } ?>
	</div>
<?php }
}

/*Remove the archive label*/
function blogxer_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'blogxer_archive_title' );

/*Infinity scroll - Ajax */
function blogxer_infinity_loading_ajax_handler(){
	
	$paged = isset($_POST['paged']) ? (absint($_POST['paged']) + 1) : 1;
	
	$num = BlogxerTheme::$options['infinity_post_load_number'];
	
	$initial_post_num = get_option( 'posts_per_page' );
	
	$args = array(
		'paged' => $paged,
		'offset' => $initial_post_num + ( $paged * $num ) ,
		'posts_per_page' => $num
	);
	$html = null;
	$more = true;
	$layout = $_POST['layout'];
	query_posts( $args );
 
	if( have_posts() ) {
		ob_start();
		// run the loop
		while( have_posts() ): the_post(); 
			
			if ( BlogxerTheme::$options['blog_style'] == 'style5' ) {
				get_template_part( 'template-parts/content-5-masonry', get_post_format() );
			} else if ( BlogxerTheme::$options['blog_style'] == 'style4' ) {
				get_template_part( 'template-parts/content-4-masonry', get_post_format() );
			} else if ( BlogxerTheme::$options['blog_style'] == 'style3' ) {
				get_template_part( 'template-parts/content-3', get_post_format() );
			} else if ( BlogxerTheme::$options['blog_style'] == 'style2' ) {
				if ( $layout == 'right-sidebar' || $layout == 'left-sidebar' ) {
				get_template_part( 'template-parts/content-2-sidebar', get_post_format() );				
				} else {
				get_template_part( 'template-parts/content-2-nosidebar', get_post_format() );
				}
				
			} else if ( BlogxerTheme::$options['blog_style'] == 'style1' ) {
				get_template_part( 'template-parts/content-1', get_post_format() );
			} 
 
		endwhile;
		$html = ob_get_clean();
 
	} else {
		$more = false;
	}	
	wp_send_json(compact('paged', 'html', 'more'));	
}
 
add_action('wp_ajax_blogxer_infinity_loadmore', 'blogxer_infinity_loading_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_blogxer_infinity_loadmore', 'blogxer_infinity_loading_ajax_handler'); // wp_ajax_nopriv_{action}

