<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$blogxer_title = woocommerce_page_title( false );
} else if ( is_404() ) {
	$blogxer_title = BlogxerTheme::$options['error_title'];
} else if ( is_search() ) {
	$blogxer_title = esc_html__( 'Search Results for : ', 'blogxer' ) . get_search_query();
} else if ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$blogxer_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$blogxer_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'blogxer' ) );
	}
} else if ( is_archive() ) {
	$blogxer_title = get_the_archive_title();
} else if ( is_page() ) {
	$blogxer_title = get_the_title();
} else if ( is_single() ) {
	$blogxer_title = get_the_title();
}

if ( BlogxerTheme::$bgtype == 'bgcolor' ) {
	$blogxer_bg = BlogxerTheme::$bgcolor;
} else {
	$blogxer_bg = 'url(' . BlogxerTheme::$bgimg . ') no-repeat scroll center center / cover';
}

if ( !empty( BlogxerTheme::$options['post_banner_title'] ) ){
	$post_banner_title = BlogxerTheme::$options['post_banner_title'];
} else {
	$post_banner_title = esc_html__( 'Our News' , 'blogxer' );
}

?>
<?php if ( BlogxerTheme::$has_banner == '1' || BlogxerTheme::$has_banner == 'on' ): ?>
	<div class="entry-banner" style="background:<?php echo esc_html( $blogxer_bg ); ?>">
		<div class="container">
			<div class="entry-banner-content">
			<?php
			
			if ( is_single() && 'video' == get_post_format( get_the_ID() ) ) { ?>
				<?php
						$categories = get_the_category();
						$count = count( $categories );
						$i = 0;
						if ( ! empty( $categories ) ) {
							foreach( $categories as $category ) {
							 $i++;
							?>
							<h1 class="entry-title"><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo esc_html( $category->name ); ?></a></h1>
							<?php if ( $count != $i ) {	echo ', '; }
							}
						} else {
							echo wp_kses_post ( $post_banner_title );
						}
					?>
				<?php } else if ( is_single() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses_post( $blogxer_title );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses_post( $blogxer_title );?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php echo wp_kses_post( $blogxer_title );?></h1>
				<?php } ?>
				<?php if ( BlogxerTheme::$has_breadcrumb == '1' || BlogxerTheme::$has_breadcrumb == 'on' ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php endif; ?>