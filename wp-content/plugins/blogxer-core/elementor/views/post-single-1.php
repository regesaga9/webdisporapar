<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

use BlogxerTheme;
use BlogxerTheme_Helper;
use \WP_Query;

$blogxer_has_entry_meta  = ( BlogxerTheme::$options['blog_author_name'] || BlogxerTheme::$options['blog_comment_num'] || BlogxerTheme::$options['blog_cats'] ) ? true : false;

$thumb_size = 'blogxer-size1';

$post_sorting = $data['post_sorting'];
$post_ordering = $data['post_ordering'];
	
$args = array(
	'posts_per_page' 	=> 1,
	'cat'            	=> (int) $data['cat'],
	'orderby' 			=> $post_sorting,
	'order' 			=> $post_ordering,
);

$query = new WP_Query( $args );
$temp = BlogxerTheme_Helper::wp_set_temp_query( $query );

?>
<div class="post-single-default post-single-<?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['content_align'] ); ?> <?php if ( empty( $data['meta_icon_display'] ) || ($data['meta_icon_display'] == 'no') ) { ?>no-icon<?php } ?>">
	<div class="row auto-clear">
	<?php if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php
			$content = BlogxerTheme_Helper::get_current_post_content();
			$content = wp_trim_words( $content, $data['count'], '' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$blogxer_comments_number = number_format_i18n( get_comments_number() );
			$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer-core' ) : esc_html__( 'Comments' , 'blogxer-core' );
			$blogxer_comments_html = $blogxer_comments_number . ' ' . $blogxer_comments_html;

			?>
			<div class="col-12">
				<div class="rtin-single-post">
					<div class="rtin-img">
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								}
								else {
									if ( !empty( BlogxerTheme::$options['no_preview_image']['id'] ) ) {
										echo wp_get_attachment_image( BlogxerTheme::$options['no_preview_image']['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . BlogxerTheme_Helper::get_img( 'noimage_1210X700.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
							?>
						</a>
						<?php if ( get_post_format( get_the_ID() ) == 'video' ) { ?>
						<div class="post-video-icon">
							<a href="<?php the_permalink(); ?>" class="video-play"><i class="fa fa-play"></i></a>
						</div>
						<?php } ?>
					</div>
					<div class="rtin-content">
						<?php if ( $blogxer_has_entry_meta ) { ?>
						<div class="post-meta">
							<ul>
								<?php if ( $data['author_display']  == 'yes' ) { ?>
								<li><i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['date_display']  == 'yes' ) { ?>
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo get_the_date(); ?></li>
								<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
								<?php } if ( $data['cat_display']  == 'yes' ) { ?>		
								<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
								<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display']  == 'yes' ) { ?>
						<?php echo wp_kses_post( $content );?>
						<?php } ?>
						
						<?php if ( ( $data['button_display']  == 'yes' ) || ( $data['view_display']  == 'yes' ) || ( $data['comment_display']  == 'yes' ) ) { ?>
						<div class="post-footer">
							<?php if ( $data['button_display']  == 'yes' ) { ?>
								<a class="item-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'READ MORE', 'blogxer-core' ); ?></span><?php if ( is_rtl() ) { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } else { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } ?></a>
							<?php } ?>
							<?php if ( ( $data['view_display']  == 'yes' ) || ( $data['comment_display']  == 'yes' ) ) { ?>
							<div class="post-meta">
								<ul>
									<?php if ( $data['view_display']  == 'yes' ) { ?>
									<li><span class="meta-views meta-item "><?php echo blogxer_views(); ?></span></li>
									<?php } if ( $data['comment_display']  == 'yes' ) { ?>
									<li><i class="fa fa-comment-o" aria-hidden="true"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo esc_html( $blogxer_comments_html );?></a></li>
									<?php } ?>
								</ul>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php endwhile;?>
	</div>
	<?php endif;?>
	<?php BlogxerTheme_Helper::wp_reset_temp_query( $temp );?>
</div>