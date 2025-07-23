<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

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
				<div class="tophead-right tophead-address">
					<?php if ( BlogxerTheme::$options['address'] ): ?>
						<i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo wp_kses_post( BlogxerTheme::$options['address'] );?></span>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
