<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

?>

<div class="rtin-contact-address <?php echo esc_attr( $data['style'] ); ?>">
	<div class="contact-info">
		<ul>
		<?php if ( !empty( $data['address'] ) ) { ?>
			<li><h3><i class="fa fa-location-arrow" aria-hidden="true"></i><?php esc_html_e( 'Office Address:', 'blogxer-core' ); ?></h3><?php echo wp_kses_post( $data['address'] ); ?></li>
		<?php } ?>
		<?php if ( !empty( $data['phone_no'] ) ) { ?>
			<li><h3><i class="fa fa-phone" aria-hidden="true"></i><?php esc_html_e( 'Phone:', 'blogxer-core' ); ?></h3>
				<?php
				foreach ( $data['phone_no'] as $phone ) {
					$phones[] = array( 'phone_numbers' => $phone['phone_numbers'] );
				}
				$phone_number_count = count( $phones );
				$i = 1;
				foreach ( $phones as $phone_number ){ ?>
					<a href="tel:<?php echo esc_attr( $phone_number['phone_numbers'] ); ?>"><?php echo esc_attr( $phone_number['phone_numbers'] ); ?></a><?php if ( $phone_number_count != $i ) { ?>,<?php } ?><?php $i++; } ?>
			</li>
		<?php } ?>		
		<?php if ( !empty( $data['email_no'] ) ) { ?>
			<li><h3><i class="fa fa-envelope" aria-hidden="true"></i><?php esc_html_e( 'Mail Us:', 'blogxer-core' ); ?></h3>
				<?php
				foreach ( $data['email_no'] as $email2 ) {
					$emails[] = array( 'email_numbers' => $email2['email_numbers'] );
				}
				$email_number_count = count( $emails );
				$i = 1;
				foreach ( $emails as $email_number ){ ?>
					<a href="mailto:<?php echo esc_attr( $email_number['email_numbers'] ); ?>"><?php echo esc_attr( $email_number['email_numbers'] ); ?></a><?php if ( $email_number_count != $i ) { ?>,<?php } ?><?php $i++; } ?>
			</li>
		<?php } ?>
		<?php if ( !empty( $data['fax_no'] ) ) { ?>
			<li><h3><i class="fa fa-fax" aria-hidden="true"></i><?php esc_html_e( 'Fax No:', 'blogxer-core' ); ?></h3>
				<?php
				foreach ( $data['fax_no'] as $fax2 ) {
					$faxs[] = array( 'fax_numbers' => $fax2['fax_numbers'] );
				}
				$email_number_count = count( $faxs );
				$i = 1;
				foreach ( $faxs as $fax_number ){ ?><?php echo esc_attr( $fax_number['fax_numbers'] ); ?><?php if ( $email_number_count != $i ) { ?>,<?php } ?><?php $i++; } ?>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>