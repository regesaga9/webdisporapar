<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Blogxer_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Slider', 'blogxer-core' );
		$this->rt_base = 'rt-post-slider';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '12 Col', 'blogxer-core' ),
				'6'  => esc_html__( '6 Col', 'blogxer-core' ),
				'4'  => esc_html__( '4 Col', 'blogxer-core' ),
				'3'  => esc_html__( '3 Col', 'blogxer-core' ),
				'2'  => esc_html__( '2 Col', 'blogxer-core' ),
				'1'  => esc_html__( '1 Col', 'blogxer-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
	}

	public function rt_fields(){
		
		$categories = get_categories();
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'blogxer-core' ) );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->term_id] = $category->name;
		}
		
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
					'style1' => esc_html__( 'Post Slider 1', 'blogxer-core' ),
					'style2' => esc_html__( 'Post Slider 2', 'blogxer-core' ),
					'style3' => esc_html__( 'Post Slider 3', 'blogxer-core' ),
					'style4' => esc_html__( 'Post Slider 4', 'blogxer-core' ),
					'style5' => esc_html__( 'Post Slider 5', 'blogxer-core' ),
					'style6' => esc_html__( 'Post Slider 6 ( Sidebar )', 'blogxer-core' ),
					'style7' => esc_html__( 'Post Slider 7', 'blogxer-core' ),
					'style8' => esc_html__( 'Post Slider 8', 'blogxer-core' ),
				),
				'default' => 'style1',
			),
			/*single or Multi category display option - switch*/
			array (
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat_num',
				'label'   => __( 'single Category /<br> Multiple category', 'blogxer-core' ),
				'options' => array(
					'single'	=> __( 'Single Category', 'blogxer-core' ),
					'multi' 	=> __( 'Multiple Category', 'blogxer-core' ),					
				),
				'default' => 'single',
			),
			/*category select( Box Single )*/
			array (
				'type'      => Controls_Manager::SELECT2,
				'id'        => 'cat_single_grid',
				'label'     => __( 'Categories', 'blogxer-core' ),
				'options'   => $category_dropdown,
				'default'   => '0',
				'multiple'  => false,
				'condition' => array( 'cat_num' => array( 'single' ) ),
			),						
			/*category select( box Multi )*/
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'category_list',
				'label'   => __( 'Add as many Categories as you want', 'blogxer-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::SELECT2,
						'name'    => 'cat_multi_grid',
						'label'   => __( 'Categories', 'blogxer-core' ),
						'options' => $category_dropdown,
						'multiple'=> false,
						'default' => '1',
					),
				),
				'condition' => array( 'cat_num' => array( 'multi' ) ),
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'blogxer-core' ),
				'options' => array(
					'des'	=> esc_html__( 'Desecending', 'blogxer-core' ),
					'asc'	=> esc_html__( 'Ascending', 'blogxer-core' ),
				),
				'default' => 'des',
			),
			/*Post Sorting*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_sorting',
				'label'   => esc_html__( 'Post Sorting', 'blogxer-core' ),
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'blogxer-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'blogxer-core' ),
					'modified' 		=> esc_html__( 'Last Modified Post', 'blogxer-core' ),
					'comment_count' => esc_html__( 'Most commented Post', 'blogxer-core' ),
					'view' 			=> esc_html__( 'Most viewed Post', 'blogxer-core' ),
				),
				'default' => 'recent',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'content_align',
				'label'   => esc_html__( 'Content Align', 'blogxer-core' ),
				'options' => array(
					'left' => esc_html__( 'Align Left' , 'blogxer-core' ),
					'center' => esc_html__( 'Align Center', 'blogxer-core' ),
					'right' => esc_html__( 'Align right', 'blogxer-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Number', 'blogxer-core' ),
				'default' => 5,
				'description' => esc_html__( 'Use -1 for showing all items', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'post_title_length',
				'label'   => esc_html__( 'Post Title Length e.g: 10', 'blogxer-core' ),
				'default' => 10,
				'description' => esc_html__( 'Maximum number of words', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'post_excerpt_length',
				'label'   => esc_html__( 'Post Excerpt Length e.g: 20', 'blogxer-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'blogxer-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'      => 'post_title_typo',
				'label'   => esc_html__( 'Post Title Style', 'blogxer-core' ),
				'selector' => '{{WRAPPER}} .post-slider-default .rtin-single-post .rtin-content h3',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_icon_color',
				'label'   => esc_html__( 'Post Meta Icon Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-slider-default .post-meta ul li i' => 'color: {{VALUE}}',
				),
			),			
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_color',
				'label'   => esc_html__( 'Post Meta Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-slider-default .post-meta ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-slider-default .post-meta ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-slider-default .rtin-content .item-btn' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_hover_color',
				'label'   => esc_html__( 'Post Meta Hover Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-slider-default .post-meta ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-slider-default .rtin-content .item-btn:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_title_color',
				'label'   => esc_html__( 'Post Title Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-slider-default .rtin-single-post .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_title_hover_color',
				'label'   => esc_html__( 'Post Title Hover Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-slider-default .rtin-single-post .rtin-content h3 a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_content_color',
				'label'   => esc_html__( 'Post Content Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-slider-default .rtin-single-post .rtin-content' => 'color: {{VALUE}}',
				),
			),						
			/*Display Post Date Format*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_date_format',
				'label'   => __( 'Post Date Format', 'blogxer-core' ),
				'options' => array(
					'global' 		=> __( 'Wordpress Setting Format', 'blogxer-core' ),
					'custom' 		=> __( 'Customized', 'blogxer-core' ),
				),
				'default' => 'global',
			),
			array(
				'mode' => 'section_end',
			),
			
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_option',
				'label'   => esc_html__( 'Custom Option', 'blogxer-core' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'author_display',
				'label'       => esc_html__( 'Author Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide. Default: off', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_display',
				'label'       => esc_html__( 'Category Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide. Default: on', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'date_display',
				'label'       => esc_html__( 'Date Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide. Default: on', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_time_display',
				'label'       => esc_html__( 'Read Time Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide. Default: on', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide. Default: on', 'blogxer-core' ),
			),	
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Read More Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide. Default: yes', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'meta_icon_display',
				'label'       => esc_html__( 'Meta Icon Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide. Default: yes', 'blogxer-core' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'blogxer-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '2',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'blogxer-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'blogxer-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'blogxer-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'blogxer-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '1',
			),
			array(
				'mode' => 'section_end',
			),
			
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_center',
				'label'       => esc_html__( 'Slider Center', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Enable or disable Center arrow. Default: On', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dot', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dot. Default: Off', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'blogxer-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'blogxer-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'blogxer-core' ),
					'4000' => esc_html__( '4 Seconds', 'blogxer-core' ),
					'3000' => esc_html__( '3 Seconds', 'blogxer-core' ),
					'2000' => esc_html__( '2 Seconds', 'blogxer-core' ),
					'1000' => esc_html__( '1 Second',  'blogxer-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'blogxer-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'slider_autoplay_speed',
				'label'   	  => esc_html__( 'Autoplay Slide Speed', 'blogxer-core' ),
				'default' 	  => 700,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'blogxer-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'blogxer-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$owl_data = array( 
			'center'             => $data['slider_center'] == 'yes' ? true : false,
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => $data['col_mobile'] ),
				'480'  => array( 'items' => $data['col_xs'] ),
				'768'  => array( 'items' => $data['col_sm'] ),
				'992'  => array( 'items' => $data['col_md'] ),
				'1200' => array( 'items' => $data['col_lg'] ),
			)
		);

		$this->rt_load_scripts();

		switch ( $data['style'] ) {
			case 'style8':
			$template = 'post-slider-8';
			break;
			case 'style7':
			$template = 'post-slider-7';
			break;
			case 'style6':
			$template = 'post-slider-6';
			break;
			case 'style5':
			$template = 'post-slider-5';
			break;
			case 'style4':
			$owl_data['margin'] = 3;
			$template = 'post-slider-4';
			break;
			case 'style3':
			$owl_data['margin'] = 5;
			$template = 'post-slider-3';
			break;
			case 'style2':
			$owl_data['margin'] = 20;
			$template = 'post-slider-2';
			break;
			default:
			$template = 'post-slider-1';
			break;
		}
		
		$data['owl_data'] = json_encode( $owl_data );
		
		return $this->rt_template( $template, $data );
	}
}