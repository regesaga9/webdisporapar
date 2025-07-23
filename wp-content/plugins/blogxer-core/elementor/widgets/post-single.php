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

class Post_Single extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Single', 'blogxer-core' );
		$this->rt_base = 'rt-post-single';
		
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
					'style1' => esc_html__( 'Single Style 1', 'blogxer-core' ),
					'style2' => esc_html__( 'Single Style 2 (Inner Content)', 'blogxer-core' ),
				),
				'default' => 'style1',
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
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'blogxer-core' ),
				'options' => $category_dropdown,
				'default' => '0',
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
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'blogxer-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'blogxer-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'blogxer-core' ),
				'default' => 10,
				'description' => esc_html__( 'Maximum number of words', 'blogxer-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'      => 'post_title_typo',
				'label'   => esc_html__( 'Post Title Style', 'blogxer-core' ),
				'selector' => '{{WRAPPER}} .post-single-default .rtin-single-post .rtin-content h3',
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_icon_color',
				'label'   => esc_html__( 'Post Meta Icon Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-single-default .rtin-single-post .post-meta ul li i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .post-footer ul li i' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_color',
				'label'   => esc_html__( 'Post Meta Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-single-default .rtin-single-post .post-meta ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .rtin-single-post .post-meta ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .post-footer ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .post-footer ul li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .rtin-content .item-btn' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_meta_hover_color',
				'label'   => esc_html__( 'Post Meta Hover Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-single-default .rtin-single-post .post-meta ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .post-footer ul li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .post-single-default .rtin-content .item-btn:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_title_color',
				'label'   => esc_html__( 'Post Title Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-single-default .rtin-single-post .rtin-content h3 a' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_title_hover_color',
				'label'   => esc_html__( 'Post Title Hover Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-single-default .rtin-single-post .rtin-content h3 a:hover' => 'color: {{VALUE}}',
				),
			),
			array (
				'type'    => Controls_Manager::COLOR,
				'id'      => 'post_content_color',
				'label'   => esc_html__( 'Post Content Color', 'blogxer-core' ),
				'default' => '',
				'selectors' => array( 
					'{{WRAPPER}} .post-single-default .rtin-single-post .rtin-content' => 'color: {{VALUE}}',
				),
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
				'default'     => 'yes',
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
				'default'     => 'yes',
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
			case 'style2':
			$template = 'post-single-2';
			break;
			default:
			$template = 'post-single-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}