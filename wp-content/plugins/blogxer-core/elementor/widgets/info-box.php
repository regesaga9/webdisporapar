<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Info_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Info Box', 'blogxer-core' );
		$this->rt_base = 'rt-info-box';
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
				'label'   => esc_html__( 'Style', 'blogxer-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'blogxer-core' ),
					'style2' => esc_html__( 'Style 2', 'blogxer-core' ),
					'style3' => esc_html__( 'Style 3', 'blogxer-core' ),
					'style4' => esc_html__( 'Style 4', 'blogxer-core' ),
					'style5' => esc_html__( 'Style 5', 'blogxer-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'title_align',
				'label'   => esc_html__( 'Title Align', 'blogxer-core' ),
				'options' => array(
					'left' => esc_html__( 'Align Left' , 'blogxer-core' ),
					'center' => esc_html__( 'Align Center', 'blogxer-core' ),
					'right' => esc_html__( 'Align right', 'blogxer-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => esc_html__( 'Icon Type', 'blogxer-core' ),
				'options' => array(
					'icon'  => esc_html__( 'Icon', 'blogxer-core' ),
					'image' => esc_html__( 'Custom Image', 'blogxer-core' ),
				),
				'default' => 'icon',
				'condition'   => array( 'style' => array( 'style2', 'style4', 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'blogxer-core' ),
				'default' => 'fa fa-university',
				'condition'   => array( 'icontype' => array( 'icon' ), 'style' => array( 'style2', 'style4', 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => esc_html__( 'Image', 'blogxer-core' ),
				'condition'   => array( 'icontype' => array( 'image' ), 'style' => array( 'style2', 'style4', 'style5' ) ),
				'description' => esc_html__( 'Recommended image size is 67x67 px', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'blogxer-core' ),
				'default' => 36,
				'condition'   => array( 'icontype' => array( 'icon' ), 'style' => array( 'style2', 'style4', 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'blogxer-core' ),
				'default' => '#646464',
				'condition'   => array( 'icontype' => array( 'icon' ), 'style' => array( 'style2', 'style4', 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'blogxer-core' ),
				'default' => esc_html__( 'Digital Solutions', 'blogxer-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title_two',
				'label'   => esc_html__( 'Title', 'blogxer-core' ),
				'default' => esc_html__( 'Digital Solutions', 'blogxer-core' ),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'blogxer-core' ),
				'default' => esc_html__( 'Lorem Ipsum hasbeen standard daand scrambled. Rimply dummy text of the printing and typesetting industry', 'blogxer-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style5' ) ),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'blogxer-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'blogxer-core' ),
				'default' => 'Read More',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Style Options', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'blogxer-core' ),
				'default' => '#111111',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-item-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .info-box .rtin-item-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'blogxer-core' ),
				'default' => '#444444',
				'selectors' => array(
					'{{WRAPPER}} .info-box .rtin-text' => 'color: {{VALUE}}',
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

		switch ( $data['style'] ) {
			case 'style5':
			$template = 'info-box-5';
			break;
			case 'style4':
			$template = 'info-box-4';
			break;
			case 'style3':
			$template = 'info-box-3';
			break;
			case 'style2':
			$template = 'info-box-2';
			break;
			default:
			$template = 'info-box-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}