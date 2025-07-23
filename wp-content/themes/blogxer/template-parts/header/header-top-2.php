<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$blogxer_socials = BlogxerTheme_Helper::socials();
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="row">
		
			<div class="col-sm-12">
				<div class="tophead-contact">
					<ul>
						<?php if ( BlogxerTheme::$options['phone'] ): ?>
							<li>
								<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( BlogxerTheme::$options['phone'] );?>"><?php echo esc_html( BlogxerTheme::$options['phone'] );?></a>
							</li>
						<?php endif; ?>
						<?php if ( BlogxerTheme::$options['email'] ): ?>
							<li>
								<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( BlogxerTheme::$options['email'] );?>"><?php echo esc_html( BlogxerTheme::$options['email'] );?></a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="tophead-right">
					<?php if ( $blogxer_socials ): ?>
						<ul class="tophead-social">
							<?php foreach ( $blogxer_socials as $blogxer_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $blogxer_social['url'] );?>"><i class="fa <?php echo esc_attr( $blogxer_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
