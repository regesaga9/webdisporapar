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

class Post_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Box', 'blogxer-core' );
		$this->rt_base = 'rt-post-box';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'blogxer-core' ),
				'6'  => esc_html__( '2 Col', 'blogxer-core' ),
				'4'  => esc_html__( '3 Col', 'blogxer-core' ),
				'3'  => esc_html__( '4 Col', 'blogxer-core' ),
				'2'  => esc_html__( '6 Col', 'blogxer-core' ),
			),
		);
		parent::__construct( $data, $args );
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
					'style1' => esc_html__( 'Box Style 1 (2:1)', 'blogxer-core' ),
					'style2' => esc_html__( 'Box Style 2 (3 Columns)', 'blogxer-core' ),
					'style3' => esc_html__( 'Box Style 3 (2 Columns)', 'blogxer-core' ),
					'style4' => esc_html__( 'Box Style 4 (One Big, 2 small, One Medium)', 'blogxer-core' ),
				),
				'default' => 'style1',
			),			
			/*single or Multi category display option - switch*/
			array (
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat_num',
				'label'   => __( 'Single Category /<br> Multiple category', 'blogxer-core' ),
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
				'default' => 'left',
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
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'blogxer-core' ),
				'default' => 3,
				'description' => esc_html__( 'Maximum number of Grid', 'blogxer-core' ),
				'condition'   => array( 'cat_num' => array( 'single' ), 'style' => array( 'style2', 'style3' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'      => 'post_title_typo',
				'label'   => esc_html__( 'Post Title Style', 'blogxer-core' ),
				'selector' => '{{WRAPPER}} .post-box-default .rtin-single-post .rtin-content h3',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'      => 'post_small_title_typo',
				'label'   => esc_html__( 'Post Small Title Style', 'blogxer-core' ),
				'selector' => '{{WRAPPER}} .post-box-default .rtin-single-post .rtin-content.small-content h3',
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_icon_color',
				'label'   => esc_html__( 'Post Meta Icon Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-box-default .rtin-single-post .post-meta ul li i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-box-default .post-footer ul li i' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_color',
				'label'   => esc_html__( 'Post Meta Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-box-default .rtin-single-post .post-meta ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-box-default .rtin-single-post .post-meta ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-box-default .post-footer ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-box-default .post-footer ul li a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_hover_color',
				'label'   => esc_html__( 'Post Meta Hover Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-box-default .rtin-single-post .post-meta ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-box-default .post-footer ul li a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_title_color',
				'label'   => esc_html__( 'Post Title Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-box-default .rtin-single-post .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_title_hover_color',
				'label'   => esc_html__( 'Post Title Hover Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-box-default .rtin-single-post .rtin-content h3 a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_content_color',
				'label'   => esc_html__( 'Post Content Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-box-default .rtin-single-post .rtin-content' => 'color: {{VALUE}}',
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
				'id'          => 'view_display',
				'label'       => esc_html__( 'View Display', 'blogxer-core' ),
				'label_on'    => esc_html__( 'On', 'blogxer-core' ),
				'label_off'   => esc_html__( 'Off', 'blogxer-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide. Default: on', 'blogxer-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'comment_display',
				'label'       => esc_html__( 'Comment Display', 'blogxer-core' ),
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
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style4':
			$template = 'post-box-4';
			break;
			case 'style3':
			$template = 'post-box-3';
			break;
			case 'style2':
			$template = 'post-box-2';
			break;
			default:
			$template = 'post-box-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}