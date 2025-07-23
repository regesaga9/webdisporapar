<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$blogxer_socials = BlogxerTheme_Helper::socials();
// Logo
$blogxer_dark_logo = empty( BlogxerTheme::$options['logo']['url'] ) ? BLOGXER_IMG_URL . 'logo-dark.png' : BlogxerTheme::$options['logo']['url'];

$blogxer_addit_info  = ( BlogxerTheme::$options['address'] || BlogxerTheme::$options['phone'] || BlogxerTheme::$options['email'] ) ? true : false;

?>

<div class="additional-menu-area">
	<div class="sidenav">
		<a href="#" class="closebtn">x</a>
		<div class="additional-logo">
			<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $blogxer_dark_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => '' ) );?>
		<div class="sidenav-address">
		<?php if ( !empty ( $blogxer_addit_info ) || !empty ( $blogxer_socials ) ) { ?>
			<h4><?php esc_html_e( 'Info', 'blogxer' );?></h4>
		<?php } ?>
		<?php if ( $blogxer_addit_info ) { ?>
			<?php if ( BlogxerTheme::$options['address'] ) { ?>
			<span><?php echo wp_kses_post( BlogxerTheme::$options['address'] );?></span>
			<?php } ?>
			<?php if ( BlogxerTheme::$options['phone'] ) { ?>
			<span><a href="tel:<?php echo esc_attr( BlogxerTheme::$options['phone'] );?>"><?php echo esc_html( BlogxerTheme::$options['phone'] );?></a></span>
			<?php } ?>
			<?php if ( BlogxerTheme::$options['email'] ) { ?>
			<span><a href="mailto:<?php echo esc_attr( BlogxerTheme::$options['email'] );?>"><?php echo esc_html( BlogxerTheme::$options['email'] );?></a></span>
			<?php } ?>
		<?php } ?>
			<?php if ( $blogxer_socials ) { ?>
				<div class="sidenav-social">
					<?php foreach ( $blogxer_socials as $blogxer_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $blogxer_social['url'] );?>"><i class="fa <?php echo esc_attr( $blogxer_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
			<?php } ?>
		</div>
	</div>
	<span class="side-menu-open side-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</span>
</div>