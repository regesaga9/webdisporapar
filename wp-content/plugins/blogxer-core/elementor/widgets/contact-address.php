<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Address extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Address', 'blogxer-core' );
		$this->rt_base = 'rt-contact-address';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Theme Style', 'blogxer-core' ),
				'options' => array(
					'light' => esc_html__( 'Light Background', 'blogxer-core' ),
					'dark'  => esc_html__( 'Dark Background', 'blogxer-core' ),
				),
				'default' => 'light',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'blogxer-core' ),
				'default' => esc_html__( '59 Street, loseagne, Newyork Road City', 'blogxer-core' ),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'phone_no',
				'label'   => esc_html__( 'Phone no', 'blogxer-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'phone_numbers',
						'label'   => __( 'Add Phone No.', 'blogxer-core' ),
						'default' => '',
					),
				),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'email_no',
				'label'   => esc_html__( 'Email', 'blogxer-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'email_numbers',
						'label'   => __( 'Add Email', 'blogxer-core' ),
						'default' => '',
					),
				),
			),
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'fax_no',
				'label'   => esc_html__( 'Fax', 'blogxer-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'fax_numbers',
						'label'   => __( 'Add Fax', 'blogxer-core' ),
						'default' => '',
					),
				),
			),
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
		
	protected function render() {
			
		$data = $this->get_settings();
		
		$template = 'contact-address';

		return $this->rt_template( $template, $data );
	}
}