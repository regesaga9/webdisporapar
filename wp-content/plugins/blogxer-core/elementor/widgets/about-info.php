<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Blogxer_Core;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class About_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT About Info', 'blogxer-core' );
		$this->rt_base = 'rt-About-info';
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
				'label'   => esc_html__( 'About Info', 'blogxer-core' ),
				'options' => array(
					'style1' => esc_html__( 'About Info 1' , 'blogxer-core' ),
					'style2' => esc_html__( 'About Info 2' , 'blogxer-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'blogxer-core' ),
				'default' => 'About Us',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'name',
				'label'   => esc_html__( 'Name', 'blogxer-core' ),
				'default' => 'Dainel Dina',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label'   => __( 'Image', 'blogxer-core' ),
				'description' => __( 'Recommended image size is 490x600 px', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'blogxer-core' ),
				'default' => esc_html__('Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus doloer.', 'blogxer-core' ),
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
			case 'style2':
			$template = 'about-info-2';
			break;
			default:
			$template = 'about-info-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}