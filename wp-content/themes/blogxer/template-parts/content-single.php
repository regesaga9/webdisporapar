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

$is_ad_active3 = ( empty( $all_ad_setting['blogxer_content_top'] ) || $all_ad_setting['blogxer_content_top'] == 'default' ) ? 'on' : 'off';

if ( $is_ad_active3 == 'on' ) {
	do_action( 'blogxer_before_content' );
}

/*Featured Image caption*/
if ( !empty( BlogxerTheme::$options['show_caption'] ) && BlogxerTheme::$options['show_caption'] == true ) {
	/*alignment*/
	if ( !empty( BlogxerTheme::$options['show_caption_align'] ) && BlogxerTheme::$options['show_caption_align'] == 'cap_right' ) {
		$cap_align_class = 'text-right';
	} else if ( !empty( BlogxerTheme::$options['show_caption_align'] ) && BlogxerTheme::$options['show_caption_align'] == 'cap_left' ) {
		$cap_align_class = 'text-left';
	} else if ( !empty( BlogxerTheme::$options['show_caption_align'] ) && BlogxerTheme::$options['show_caption_align'] == 'cap_center' ) {
		$cap_align_class = 'text-center';
	} else {
		$cap_align_class = 'text-justify';
	}
}
if ( !empty( BlogxerTheme::$options['show_caption_place'] )) {
	$caption_place_class = BlogxerTheme::$options['show_caption_place'];
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php if ( BlogxerTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
					<div class="entry-thumbnail-area <?php echo esc_attr( $caption_place_class ); ?>"><?php the_post_thumbnail( 'blogxer-size1' , ['class' => 'img-responsive'] ); ?>
						<?php if ( BlogxerTheme::$options['show_caption'] == true ) { ?>
							<?php if ( get_post(get_post_thumbnail_id())->post_excerpt ) { ?>
								<div class="featured-image-caption <?php echo esc_attr( $cap_align_class ); ?>"><?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_excerpt); ?></div>
							<?php } ?>
						<?php } ?>
					</div>
			<?php } ?>
		<?php } ?>
		<?php if ( BlogxerTheme::$has_banner == '0' || BlogxerTheme::$has_banner == 'off' ) { ?>
			<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
			<?php if ( BlogxerTheme::$has_breadcrumb == '1' || BlogxerTheme::$has_breadcrumb == 'on' ) { ?>
				<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
			<?php } ?>
		<?php } ?>
		<div class="entry-meta">
			<?php if ( $blogxer_has_entry_meta ) { ?>
			<ul class="post-light">
			<?php if ( BlogxerTheme::$options['post_author_name'] == 1 ) { ?>
				<li class="post-author">
					<?php
					if ( BlogxerTheme::$options['post_author_name'] == '1' ) {
						echo get_avatar( get_the_author_meta( 'ID', $author ), 35, null, get_the_author_meta('display_name', $author) );
						echo esc_html__( 'By ', 'barta' );
						
						printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>',
						esc_url( get_author_posts_url( get_the_author_meta('ID', $author) ) ),
						get_the_author_meta('display_name', $author));
					}
					?> 
					<?php if ( BlogxerTheme::$options['post_author_social'] == '1' ) { ?> -
					<?php if ( !empty( $news_author_tw ) ) { ?>
					<a target="_blank" class="author-social" href="http://twitter.com/<?php the_author_meta( 'barta_twitter' ); ?>" title="Follow <?php the_author_meta( 'display_name' ); ?> on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<?php } if ( !empty( $news_author_fb ) ) { ?>
					<a target="_blank" class="author-social" href="<?php the_author_meta( 'barta_facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
					<?php } if ( !empty( get_the_author_meta( 'user_url' ) ) ) { ?>
					<a target="_blank" class="author-social" href="<?php echo get_the_author_meta( 'user_url' ); ?>" title="<?php the_author_meta( 'user_url' ); ?> website"><i class="fa fa-globe" aria-hidden="true"></i></a>
					<?php } if ( !empty( get_the_author_meta( 'user_email' ) ) ) { ?>
					<a target="_blank" class="author-social" href="mailto:<?php the_author_meta( 'user_email' ); ?>" title="<?php the_author_meta( 'display_name' ); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a> 
					<?php } ?>
					<?php } ?>
				</li>	
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
	<?php
$is_ad_active4 = ( empty( $all_ad_setting['blogxer_content_below'] ) || $all_ad_setting['blogxer_content_below'] == 'default' ) ? 'on' : 'off';
	if ( $is_ad_active4 == 'on' ) {
		do_action( 'blogxer_after_content' );
	}
	?>
	<!-- author bio -->
	<?php if ( BlogxerTheme::$options['post_author_bio'] == '1' ) { ?>
		<div class="media about-author">
			<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
				<?php echo get_avatar( $author, 105 ); ?>
			</div>
			<div class="media-body">
				<div class="about-author-info">
					<h3 class="author-title"><?php the_author_posts_link();?></h3>
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