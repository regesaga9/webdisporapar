<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$blogxer_has_entry_meta  = ( ( !has_post_thumbnail() && BlogxerTheme::$options['post_date'] ) || BlogxerTheme::$options['post_author_name'] || BlogxerTheme::$options['post_comment_num'] || BlogxerTheme::$options['post_cats'] || ( BlogxerTheme::$options['post_length'] && function_exists( 'blogxer_reading_time' ) ) || ( BlogxerTheme::$options['post_view'] && function_exists( 'blogxer_views' ) ) ) ? true : false;

$blogxer_comments_number = number_format_i18n( get_comments_number() );
$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer' ) : esc_html__( 'Comments' , 'blogxer' );
$blogxer_comments_html = $blogxer_comments_number .' '. $blogxer_comments_html;
$blogxer_author_bio      = get_the_author_meta( 'description' );

$subtitle = get_post_meta( get_the_ID(), 'blogxer_subtitle', true );
$youtube_link = get_post_meta( get_the_ID(), 'blogxer_youtube_link', true );
$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'blogxer_facebook', true );
$news_author_tw = get_user_meta( $author, 'blogxer_twitter', true );
$news_author_ld = get_user_meta( $author, 'blogxer_linkedin', true );
$news_author_gp = get_user_meta( $author, 'blogxer_gplus', true );
$news_author_pr = get_user_meta( $author, 'blogxer_pinterest', true );
$blogxer_author_designation = get_user_meta( $author, 'blogxer_author_designation', true );

// Layout class
if ( BlogxerTheme::$layout == 'full-width' ) {
	$blogxer_layout_class = 'col-sm-12 col-12';
} else {
	$blogxer_layout_class = 'col-xl-9 col-lg-9 col-md-12';
}
?>	
	<?php	
	$id = get_the_ID();
	
	if ( BlogxerTheme::$layout == 'left-sidebar' ) { ?>
		<?php get_sidebar(); ?>
	<?php } ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class( $blogxer_layout_class); ?> class="<?php echo esc_attr( $blogxer_layout_class );?>">
		<?php 
			$is_ad_active3 = ( empty( $all_ad_setting['blogxer_content_top'] ) || $all_ad_setting['blogxer_content_top'] == 'default' ) ? 'on' : 'off';
			if ( $is_ad_active3 == 'on' ) {
				do_action( 'blogxer_before_content' );
			}
		?>
		<?php if ( BlogxerTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="entry-thumbnail-area position-relative">
					<?php the_post_thumbnail( 'full' , ['class' => 'img-fluid'] ); ?>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="detail-content-holder">
			<?php if ( BlogxerTheme::$has_banner == '0' || BlogxerTheme::$has_banner == 'off' ) { ?>
				<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
				<?php if ( BlogxerTheme::$has_breadcrumb == '1' || BlogxerTheme::$has_breadcrumb == 'on' ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			<?php } ?>
			<div class="entry-header">
				<div class="entry-meta">
					<?php if ( $blogxer_has_entry_meta ) { ?>
					<ul class="post-light">
						<?php if ( BlogxerTheme::$options['post_author_name'] ) { ?>
						<li><?php the_author_posts_link(); ?></li>
						<?php } if ( BlogxerTheme::$options['post_date'] ) { ?>			
						<li><?php echo get_the_date();?></li>
						<?php } if ( BlogxerTheme::$options['post_cats'] ) { ?>			
						<li class="blog-cat"><?php echo the_category( ', ' );?></li>
						<?php } if ( BlogxerTheme::$options['post_length'] && function_exists( 'blogxer_reading_time' ) ) { ?>
						<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
						<?php } if ( BlogxerTheme::$options['post_view'] && function_exists( 'blogxer_views' ) ) { ?>
						<li><span class="meta-views meta-item "><?php echo blogxer_views(); ?></span></li>
						<?php } if ( BlogxerTheme::$options['post_comment_num'] ) { ?>
						<li><?php echo esc_html($blogxer_comments_html); ?></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<?php if ( ( BlogxerTheme::$options['post_share'] ) && ( function_exists( 'blogxer_post_share' ) ) ) { ?>
					<div class="post-share"><?php blogxer_post_share(); ?></div>
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
			<?php if ( !empty( get_the_content() ) ) { ?>
				<div class="entry-content rt-single-content"><?php the_content();?>
					<?php wp_link_pages( array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'blogxer' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) ); ?>
				</div>
			<?php } ?>
		
			<?php if ( ( BlogxerTheme::$options['post_tags'] && has_tag() ) || BlogxerTheme::$options['post_share'] ) { ?>
			<div class="entry-footer">
				<div class="entry-footer-meta">
					<?php if ( BlogxerTheme::$options['post_tags'] && has_tag() ) { ?>
					<div class="item-tags">
						<span><i class="fa fa-bookmark" aria-hidden="true"></i></span><?php echo get_the_term_list( $post->ID, 'post_tag', '', ',', '' ); ?>
					</div>
					<?php } if ( ( BlogxerTheme::$options['post_share'] ) && ( function_exists( 'blogxer_post_share' ) ) ) { ?>
					<div class="post-share"><?php blogxer_post_share(); ?></div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
			$is_ad_active4 = ( empty( $all_ad_setting['blogxer_content_below'] ) || $all_ad_setting['blogxer_content_below'] == 'default' ) ? 'on' : 'off';			
			if ( $is_ad_active4 == 'on' ) {
				do_action( 'blogxer_after_content' );
			}
		?>
		<!-- author bio -->
		<?php if ( BlogxerTheme::$options['post_author_bio'] == '1' ) { ?>
			<div class="media about-author">
				<div class="<?php if ( is_rtl() ) { ?> pull-right text-right <?php } else { ?> pull-left <?php } ?>">
					<?php echo get_avatar( $author, 105 ); ?>
				</div>
				<div class="media-body">
					<div class="about-author-info">
						<div class="author-title"><?php the_author_posts_link();?></div>
						<div class="author-designation"><?php if ( !empty ( $blogxer_author_designation ) ) {	echo esc_html( $blogxer_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
					</div>
					<?php if ( $blogxer_author_bio ) { ?>
					<div class="author-bio"><?php echo esc_html( $blogxer_author_bio );?></div>
					<?php } ?>
					<ul class="author-box-social">
						<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_gp ) ){ ?><li><a href="<?php echo esc_attr( $news_author_gp ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><?php } ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>			
		<?php } ?>		
		<?php if( BlogxerTheme::$options['show_related_post'] == '1' && is_single() && !empty ( blogxer_related_post() ) ) { ?>
		<div class="related-post">
			<?php blogxer_related_post(); ?>
		</div>
		<?php } ?>		
		<?php
			if ( comments_open() || get_comments_number() ){
				comments_template();
			}
		?>
		<!-- next/prev post -->
		<?php if ( BlogxerTheme::$options['post_links'] ) { blogxer_post_links_next_prev(); } ?>	
	</div>
	
	<?php if ( BlogxerTheme::$layout == 'right-sidebar' ) { ?>
		<?php get_sidebar(); ?>
	<?php } ?>