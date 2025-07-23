<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Info', 'blogxer-core' );
		$this->rt_base = 'rt-contact-info';
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
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'blogxer-core' ),
				'default' => esc_html__( 'Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and typesetting industry', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'blogxer-core' ),
				'default' => esc_html__( '29 Street, Melbourne City, Australia # 34 Road, House #10.', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone1',
				'label'   => esc_html__( 'Phone 1', 'blogxer-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone2',
				'label'   => esc_html__( 'Phone 2', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'fax',
				'label'   => esc_html__( 'Fax', 'blogxer-core' ),
				'default' => '+0000000000',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email',
				'label'   => esc_html__( 'Email', 'blogxer-core' ),
				'default' => 'info@example.com',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'blogxer-core' ),
				'default' => '#444444',
				'selectors' => array(
					'{{WRAPPER}} .rtin-contact-info ul li i' => 'color: {{VALUE}}',
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

		$template = 'contact-info';

		return $this->rt_template( $template, $data );
	}
}