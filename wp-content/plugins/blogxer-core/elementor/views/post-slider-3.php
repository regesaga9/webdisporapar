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

$thumb_size = 'blogxer-size14';

$number_of_post = $data['itemlimit'];
$post_sorting = $data['post_sorting'];
$post_ordering = $data['post_ordering'];
$title_limit = $data['post_title_length'];
$content_limit = $data['post_excerpt_length'];
$i = 1;	

$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="post-slider-default owl-wrap rt-owl-nav-1 <?php echo esc_attr( $slider_nav_class ); ?><?php echo esc_attr( $slider_dot_class ); ?> post-slider-<?php echo esc_attr( $data['style'] ); ?> <?php if ( empty( $data['meta_icon_display'] ) || ($data['meta_icon_display'] == 'no') ) { ?>no-icon<?php } ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $data['owl_data'] );?>">
	<?php
	if ( $data['cat_num'] == 'multi' ) {
		// build up the array
		foreach ( $data['category_list'] as $cat ) { $cats[] = array( 'cat_multi_grid' => $cat['cat_multi_grid'] ); }
		if ( !empty( $cats ) ) {
		//category
		$category_number = count( $cats );
		foreach ( $cats as $cat ) {
		if ( $cat['cat_multi_grid'] != 0 ) {
		
		$args = array(
			'cat' => $cat['cat_multi_grid'],
			'order' => $post_ordering,
			'posts_per_page' => 1,
		);
			
		if ( $post_sorting == 'view' ) {
			$args['orderby']  = 'meta_value_num';
			$args['meta_key'] = 'blogxer_views';
		} else {
			$args['orderby'] = $post_sorting;
		}
		$query = new WP_Query( $args );
		
		$temp = BlogxerTheme_Helper::wp_set_temp_query( $query );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post();
			$content = wp_trim_words(get_the_excerpt(), $content_limit, '');
			$title = wp_trim_words( get_the_title(), $title_limit, '' );
			$blogxer_comments_number = number_format_i18n( get_comments_number() );
			$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer-core' ) : esc_html__( 'Comments' , 'blogxer-core' );
			$blogxer_comments_html = '('. $blogxer_comments_number . ') ' . $blogxer_comments_html;
			if ( !empty( $data['post_date_format'] ) ) {
				if ( $data['post_date_format'] == 'global' ){
					$formatted_post_date = get_the_date(); 
				} else {
					$formatted_post_date = get_the_date( 'M d, Y' );
				}
			}
	?>
			<div class="rtin-single-post <?php echo esc_attr( $data['content_align'] ); ?>">
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
								echo '<img class="wp-post-image" src="' . BlogxerTheme_Helper::get_img( 'noimage_630X650.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>
				</a>
				</div>
				<div class="rtin-content">
					<?php if ( $blogxer_has_entry_meta ) { ?>
					<div class="post-meta">
						<ul>
							<?php if ( $data['author_display']  == 'yes' ) { ?>
							<li><i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?></li>
							<?php } if ( $data['date_display']  == 'yes' ) { ?>
							<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo wp_kses_post( $formatted_post_date); ?></li>
							<?php } if ( $data['cat_display']  == 'yes' ) { ?>
							<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
							<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
							<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
					<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3><?php if ( $data['content_display']  == 'yes' ) { ?><?php echo wp_kses_post( $content );?><?php } ?><?php if ( $data['button_display']  == 'yes' ) { ?><a class="item-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'Read More', 'blogxer-core' ); ?></span><?php if ( is_rtl() ) { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } else { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } ?></a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php } else { ?>
		<div class="col-lg-12 col-sm-12 col-12"><?php esc_html_e( 'No Post/News Found', 'blogxer-core' ); ?></div>
		<?php } BlogxerTheme_Helper::wp_reset_temp_query( $temp ); 
		} $i++; } } ?>
		<?php
		} else {
			// number
			$number_of_post = $data['itemlimit'];
			$cat_single_grid = $data['cat_single_grid'];
			
			$args = array(
				'cat' => $cat_single_grid,
				'post_status' => 'publish',
				'order' => $post_ordering,
				'posts_per_page' => $number_of_post,
			);
				
			if ( $post_sorting == 'view' ) {
				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'blogxer_views';
			} else {
				$args['orderby'] = $post_sorting;
			}
			
			$query = new WP_Query( $args );
			
			$temp = BlogxerTheme_Helper::wp_set_temp_query( $query );
			
			if ( $query->have_posts() ) {	
				while ( $query->have_posts() ) {
				$query->the_post();
				$content = wp_trim_words( get_the_excerpt(), $content_limit, '' );
				$title = wp_trim_words( get_the_title(), $title_limit, '' );
				$blogxer_comments_number = number_format_i18n( get_comments_number() );
				$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer-core' ) : esc_html__( 'Comments' , 'blogxer-core' );
				$blogxer_comments_html = '('. $blogxer_comments_number . ') ' . $blogxer_comments_html;
				if ( !empty( $data['post_date_format'] ) ) {
					if ( $data['post_date_format'] == 'global' ){
						$formatted_post_date = get_the_date(); 
					} else {
						$formatted_post_date = get_the_date( 'M d, Y' );
					}
				}
		?>
			
		<div class="rtin-single-post <?php echo esc_attr( $data['content_align'] ); ?>">
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
							echo '<img class="wp-post-image" src="' . BlogxerTheme_Helper::get_img( 'noimage_630X650.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
				?>
			</a>
			</div>
			<div class="rtin-content">
				<?php if ( $blogxer_has_entry_meta ) { ?>
				<div class="post-meta">
					<ul>
						<?php if ( $data['author_display']  == 'yes' ) { ?>
						<li><i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link(); ?></li>
						<?php } if ( $data['date_display']  == 'yes' ) { ?>
						<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo wp_kses_post( $formatted_post_date); ?></li>
						<?php } if ( $data['cat_display']  == 'yes' ) { ?>
						<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
						<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
						<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
				<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3><?php if ( $data['content_display']  == 'yes' ) { ?><?php echo wp_kses_post( $content );?><?php } ?><?php if ( $data['button_display']  == 'yes' ) { ?><a class="item-btn" href="<?php the_permalink(); ?>"><span><?php esc_html_e( 'Read More', 'blogxer-core' ); ?></span><?php if ( is_rtl() ) { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } else { ?><i class="fa fa-arrow-right" aria-hidden="true"></i><?php } ?></a>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
	<?php BlogxerTheme_Helper::wp_reset_temp_query( $temp );?>
	<?php } ?>
	</div>
</div>