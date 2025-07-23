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

$thumb_size = 'blogxer-size2';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

/*New*/
$number_of_post = $data['itemlimit'];
$post_sorting = $data['post_sorting'];
$post_ordering = $data['post_ordering'];
$title_limit = $data['post_title_length'];
$content_limit = $data['post_excerpt_length'];
$i = 1;
?>
<div class="post-list-default post-list-<?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['content_align'] ); ?> <?php if ( empty( $data['meta_icon_display'] ) || ($data['meta_icon_display'] == 'no') ) { ?>no-icon<?php } ?>">
	<div class="auto-clear">
		<div class="row rtin-single-post">
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
				$i = 1;
				while ( $query->have_posts() ) {
				$query->the_post();
				$excerpt = wp_trim_words(get_the_excerpt(), $content_limit, '');
				$title = wp_trim_words( get_the_title(), $title_limit, '' );
				$blogxer_comments_number = number_format_i18n( get_comments_number() );
				$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer-core' ) : esc_html__( 'Comments' , 'blogxer-core' );
				$blogxer_comments_html = $blogxer_comments_number . ' ' . $blogxer_comments_html;
				if ( !empty( $data['post_date_format'] ) ) {
					if ( $data['post_date_format'] == 'global' ){
						$formatted_post_date = get_the_date(); 
					} else {
						$formatted_post_date = get_the_date( 'M d, Y' );
					}
				}
				
				if( $i == 1 ){
				?>
				<div class="col-xl-7 col-lg-12 content-left">
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
										echo '<img class="wp-post-image" src="' . BlogxerTheme_Helper::get_img( 'noimage_900X500.jpg' ) . '" alt="'.get_the_title().'">';
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
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo wp_kses_post ( $formatted_post_date ); ?></li>
								<?php } if ( $data['cat_display']  == 'yes' ) { ?>		
								<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
								<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
								<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display']  == 'yes' ) { ?><p><?php echo wp_kses_post( $excerpt ); ?></p><?php } ?>
						
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
					
				<?php } else {
					
				if ( $i == 2 ){ echo '<div class="col-xl-5 col-lg-12 content-right">'; } ?>
					<div class="rtin-content">
						<?php if ( $blogxer_has_entry_meta ) { ?>
						<div class="post-meta">
							<ul>
								<?php if ( $data['cat_display']  == 'yes' ) { ?>		
								<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
								<?php } if ( $data['date_display']  == 'yes' ) { ?>
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo wp_kses_post ( $formatted_post_date ); ?></li>
								<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
								<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
					</div>
					<?php if( $query->post_count===$i ){ echo '</div>'; }
				} ?>
			
		<?php $i++;	?>
		<?php } ?>
		<?php } else { ?>
		<div class="col-lg-12 col-sm-12 col-12"><?php esc_html_e( 'No Post/News Found', 'blogxer-core' ); ?></div>
		<?php } BlogxerTheme_Helper::wp_reset_temp_query( $temp ); 
		} $i++; } }
		} else {	
			// number
			$number_of_post = $data['itemlimit'];
			$cat_single_grid = $data['cat_single_grid'];
			
			$args = array(
				'cat' => $cat_single_grid,
				'post_status' => 'publish',
				'order' => $post_ordering,
				'posts_per_page' => $number_of_post,
				'paged'          => $paged,
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
				$excerpt = wp_trim_words( get_the_excerpt(), $content_limit, '' );		
				$title = wp_trim_words( get_the_title(), $title_limit, '' );
				$blogxer_comments_number = number_format_i18n( get_comments_number() );
				$blogxer_comments_html = $blogxer_comments_number == 1 ? esc_html__( 'Comment' , 'blogxer-core' ) : esc_html__( 'Comments' , 'blogxer-core' );
				$blogxer_comments_html = $blogxer_comments_number . ' ' . $blogxer_comments_html;
				if ( !empty( $data['post_date_format'] ) ) {
					if ( $data['post_date_format'] == 'global' ){
						$formatted_post_date = get_the_date(); 
					} else {
						$formatted_post_date = get_the_date( 'M d, Y' );
					}
				}
				if( $i == 1 ){
				?>
				<div class="col-xl-7 col-lg-12 content-left">
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
										echo '<img class="wp-post-image" src="' . BlogxerTheme_Helper::get_img( 'noimage_900X500.jpg' ) . '" alt="'.get_the_title().'">';
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
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo wp_kses_post ( $formatted_post_date ); ?></li>
								<?php } if ( $data['cat_display']  == 'yes' ) { ?>		
								<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
								<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
								<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display']  == 'yes' ) { ?><p><?php echo wp_kses_post( $excerpt );?></p><?php } ?>
						
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
					
				<?php } else {
					
				if ( $i == 2 ){ echo '<div class="col-xl-5 col-lg-12 content-right">'; } ?>
					<div class="rtin-content">
						<?php if ( $blogxer_has_entry_meta ) { ?>
						<div class="post-meta">
							<ul>
								<?php if ( $data['cat_display']  == 'yes' ) { ?>		
								<li class="blog-cat"><i class="fa fa-tag" aria-hidden="true"></i><?php echo the_category( ', ' );?></li>
								<?php } if ( $data['date_display']  == 'yes' ) { ?>
								<li><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo wp_kses_post ( $formatted_post_date ); ?></li>
								<?php } if ( $data['read_time_display']  == 'yes' ) { ?>
								<li class="meta-reading-time meta-item"> <?php echo blogxer_reading_time(); ?></li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
					</div>
					<?php if( $query->post_count===$i ){ echo '</div>'; }
				} ?>			
		<?php $i++; } ?>
		<?php if ( $data['pagination_display'] == 'yes' ) { ?>
			<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php BlogxerTheme_Helper::pagination(); ?></div>
		<?php } ?>
		<?php } ?>	
	<?php BlogxerTheme_Helper::wp_reset_temp_query( $temp );?>
	<?php } ?>
	</div>
	</div>
</div>