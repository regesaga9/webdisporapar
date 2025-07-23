<?php
/**
 * Template Name: Archive style 1
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( BlogxerTheme::$layout == 'full-width' ) {
	$blogxer_layout_class = 'col-sm-12 col-12';
}
else{
	$blogxer_layout_class = 'col-lg-9 col-md-12 col-12';
}

$args = array(
	'post_type' => "post",
);

if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( BlogxerTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $blogxer_layout_class );?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
						<?php
							echo '<div class="auto-clear">';
							$i = 0;							
							while ( have_posts() ) : the_post();					
							blogxer_loadtemplate('template-parts/content-4', array('i' => $i ));				
							$i++;
							endwhile;
							echo '</div>';
						?>
						<div class="mt50"><?php BlogxerTheme_Helper::pagination();?></div>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					
				</main>
			</div>
			<?php if ( BlogxerTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>