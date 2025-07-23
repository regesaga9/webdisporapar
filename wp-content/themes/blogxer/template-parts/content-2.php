<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$blogxer_has_entry_meta  = ( ( !has_post_thumbnail() && BlogxerTheme::$options['blog_date'] ) || BlogxerTheme::$options['blog_author_name'] || BlogxerTheme::$options['blog_comment_num'] || BlogxerTheme::$options['blog_cats'] ) ? true : false;

$blogxer_has_entry_meta2  = ( BlogxerTheme::$options['blog_author_name'] || BlogxerTheme::$options['blog_date'] || BlogxerTheme::$options['blog_cats'] ) ? true : false;

$thumb_size = 'blogxer-size9';
$blogxer_comments_number = number_format_i18n( get_comments_number() );
$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer' ) : esc_html__( 'Comments' , 'blogxer' );
$blogxer_comments_html = $blogxer_comments_number . ' ' . $blogxer_comments_html;

$thumbnail = false;
$post_image = '';
$post_layout_class = '';
if ( ( !has_post_thumbnail() ) && BlogxerTheme::$options['display_no_preview_image'] == '0' ) {
	$post_layout_class = 'col-lg-12 col-md-12';	
} else {
	$post_layout_class = 'col-lg-7 col-md-12';	
}
if ( BlogxerTheme::$layout != 'full-width' ) {	
	$post_image = 'col-lg-5 col-md-12 col-sm-12 col-12';	
} else {
	$post_image = 'col-lg-5 col-md-5 col-sm-4 col-12';
}
$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( $content, BlogxerTheme::$options['post_content_limit'], '' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'row entry-header blog-layout-2' ); ?>>
	<?php if ( has_post_thumbnail() || BlogxerTheme::$options['display_no_preview_image'] == '1'  ) { ?>
		<div class="<?php echo esc_attr( $post_image ); ?>">
			<div class="blog-img-holder">
				<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'blogxer-size9', ['class' => 'img-responsive'] ); ?>
					<?php } else {
					if ( BlogxerTheme::$options['display_no_preview_image'] == '1' ) {
						if ( !empty( BlogxerTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = wp_get_attachment_image( BlogxerTheme::$options['no_preview_image']['id'], $thumb_size );						
						}
						elseif ( empty( BlogxerTheme::$options['no_preview_image']['id'] ) ) {
							$thumbnail = '<img class="wp-post-image" src="'.BLOGXER_IMG_URL.'noimage_610X430.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						}
						echo wp_kses_post( $thumbnail );				
					}
				}
				?></a>
			</div>
		</div>
	<?php } ?>
	<div class="<?php echo esc_attr( $post_layout_class ); ?>">
		<div class="entry-content">
			<?php if ( $blogxer_has_entry_meta2 ) { ?>
			<div class="entry-meta">
				<ul>
					<?php if ( BlogxerTheme::$options['blog_author_name'] ) { ?>
					<li><?php the_author_posts_link(); ?></li>
					<?php } if ( BlogxerTheme::$options['blog_date'] ) { ?>
					<li><?php echo get_the_date(); ?></li>
					<?php } if ( BlogxerTheme::$options['blog_cats'] ) { ?>			
					<li class="blog-cat"><?php echo the_category( ', ' );?></li>
					<?php } if ( BlogxerTheme::$options['blog_length'] && function_exists( 'blogxer_reading_time' ) ) { ?>
					<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
					<?php } if ( BlogxerTheme::$options['blog_view'] && function_exists( 'blogxer_views' ) ) { ?>
					<li><span class="meta-views meta-item "><?php echo blogxer_views(); ?></span></li>
					<?php } if ( BlogxerTheme::$options['blog_comment_num'] ) { ?>
					<li><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo esc_html( $blogxer_comments_html );?></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<div class="blog-text"><p><?php echo wp_kses_post( $content ); ?></p></div>
			<div class="comm-views">
				<a class="item-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'READ MORE', 'blogxer' ); ?></span><?php if ( is_rtl() ) { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } else { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } ?></a>
			</div>
		</div>
	</div>	
</div>