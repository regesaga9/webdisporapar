<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'blogxer-core' );
		$this->rt_base = 'rt-Counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );
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
				'id'      => 'iconalign',
				'label'   => esc_html__( 'Icon Align', 'blogxer-core' ),
				'options' => array(
					'left' => esc_html__( 'left', 'blogxer-core' ),
					'center' => esc_html__( 'Center', 'blogxer-core' ),
					'right' => esc_html__( 'Right', 'blogxer-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon/image', 'blogxer-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show', 'blogxer-core' ),
					'hide'        => esc_html__( 'Hide', 'blogxer-core' ),
				),
				'default' => 'show',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'icontype',
				'label'   => __( 'Icon Type', 'blogxer-core' ),
				'options' => array(
					'icon'  => __( 'Icon', 'blogxer-core' ),
					'image' => __( 'Custom Image', 'blogxer-core' ),
				),
				'default' => 'icon',
			),
			array(
				'type'    => Controls_Manager::ICON,
				'id'      => 'icon',
				'label'   => __( 'Icon', 'blogxer-core' ),
				'default' => 'fa fa-book',
				'condition'   => array( 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => __( 'Image', 'blogxer-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
				'description' => __( 'Recommended image size is 67x67 px', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'blogxer-core' ),
				'default' => esc_html__( 'Total Posts', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'blogxer-core' ),
				'default' => 5000,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'blogxer-core' ),
				'default' => 2000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'blogxer-core' ),
				'default' => 50,
				'description' => esc_html__( 'Counter steps eg. 10', 'blogxer-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_colors',
				'label'   => esc_html__( 'Colors', 'blogxer-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'blogxer-core' ),
				'default' => '#646464',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'blogxer-core' ),
				'default' => '#111111',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'blogxer-core' ),
				'default' => '#444444',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title_size',
				'label'   => esc_html__( 'Title Font Size', 'blogxer-core' ),
				'default' => '20',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'counter_size',
				'label'   => esc_html__( 'Counter Font Size', 'blogxer-core' ),
				'default' => '48',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Font Size', 'blogxer-core' ),
				'default' => '48',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item i' => 'font-size: {{VALUE}}px',
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
		$this->rt_load_scripts();
		
		$template = 'counter';

		return $this->rt_template( $template, $data );
	}
}