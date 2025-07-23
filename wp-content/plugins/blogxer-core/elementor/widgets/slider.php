<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;

use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit;

class Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'FullScreen Slider', 'blogxer-core' );
		$this->rt_base = 'rt-slider';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'nivo-slider' );
		wp_enqueue_script( 'nivo-slider' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'slides',
				'label'   => esc_html__( 'Add as many slides as you want', 'blogxer-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::MEDIA,
						'name'    => 'image',
						'label'   => esc_html__( 'Image', 'blogxer-core' ),
						'description' => esc_html__( 'Image size should be 1920x820 px', 'blogxer-core' ),
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'title',
						'label'   => esc_html__( 'Title', 'blogxer-core' ),
						'default' => 'LOREM IPSUM DUMMY TEXT',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'name'      => 'title_color',
						'label'   => esc_html__( 'Title Color', 'blogxer-core' ),
						'default' => '#111111',
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'subtitle',
						'label'   => esc_html__( 'Subtitle(For desktop and tab)', 'blogxer-core' ),
						'default' => 'Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teididunt ut labore et orem ipsum dolor sit ameo eiusmod tm do eiusmod teididunt ut labore et dolore',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'name'      => 'subtitle_color',
						'label'   => esc_html__( 'Subtitle Color', 'blogxer-core' ),
						'default' => '#444444',
					),
					array(
						'type'    => Controls_Manager::TEXTAREA,
						'name'    => 'subtitle_mob',
						'label'   => esc_html__( 'Subtitle(For mobile)', 'blogxer-core' ),
						'default' => 'Dorem ipsum dolor sit amet, consectetur adipisicing',
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'buttontext',
						'label'   => esc_html__( 'Button Text', 'blogxer-core' ),
						'default' => 'LOREM IPSUM',
					),
					array(
						'type'    => Controls_Manager::TEXT,
						'name'    => 'buttonurl',
						'label'   => esc_html__( 'Button URL', 'blogxer-core' ),
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

		$this->rt_load_scripts();

		$template = 'slider';

		return $this->rt_template( $template, $data );
	}
}