<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<?php 
	$is_ad_active3 = ( empty( $all_ad_setting['blogxer_content_top'] ) || $all_ad_setting['blogxer_content_top'] == 'default' ) ? 'on' : 'off';
	if ( $is_ad_active3 == 'on' ) {
		do_action( 'blogxer_before_content' );
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ): ?>
        <div class="entry-thumbnail"><?php the_post_thumbnail( 'blogxer-size1' );?></div>
    <?php endif; ?>
	
	<div class="entry-content">
        <?php the_content();?>
		<?php
			wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'blogxer' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div>
</article>
<?php
	$is_ad_active4 = ( empty( $all_ad_setting['blogxer_content_below'] ) || $all_ad_setting['blogxer_content_below'] == 'default' ) ? 'on' : 'off';
	if ( $is_ad_active4 == 'on' ) {
		do_action( 'blogxer_after_content' );
	}
?>