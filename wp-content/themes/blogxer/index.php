<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( BlogxerTheme::$layout == 'full-width' ) {
	$blogxer_layout_class = 'col-sm-12 col-12';
}
else{
	$blogxer_layout_class = BlogxerTheme_Helper::has_active_widget();
}
$blogxer_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( BlogxerTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $blogxer_layout_class );?>">
				<main id="main" class="site-main">				
				<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $blogxer_is_post_archive && BlogxerTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $blogxer_is_post_archive && BlogxerTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $blogxer_is_post_archive && BlogxerTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="auto-clear">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $blogxer_is_post_archive && BlogxerTheme::$options['blog_style'] == 'style4' ) {
							$i = 0;							
							while ( have_posts() ) : the_post();					
							blogxer_loadtemplate('template-parts/content-4', array('i' => $i ));				
							$i++;
							endwhile;
						} else if ( class_exists( 'Blogxer_Core' ) ) {
							if ( is_tax( 'blogxer_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php BlogxerTheme_Helper::pagination(); ?>
						
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
				</main>
			</div>
			<?php
			if ( BlogxerTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>