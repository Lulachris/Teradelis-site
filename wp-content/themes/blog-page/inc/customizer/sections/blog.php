<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'blog_page_blog_section', array(
	'title'             => esc_html__( 'Blog','blog-page' ),
	'description'       => esc_html__( 'Blog Section options.', 'blog-page' ),
	'panel'             => 'blog_page_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'blog_page_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'blog-page' ),
	'section'           => 'blog_page_blog_section',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'blog_page_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'blog_page_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'blog-page' ),
	'section'        	=> 'blog_page_blog_section',
	'active_callback' 	=> 'blog_page_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blog_page_theme_options[blog_title]', array(
		'selector'            => '#life-style .section-header h2.section-title',
		'settings'            => 'blog_page_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'blog_page_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'blog_page_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'blog_page_sanitize_select',
) );

$wp_customize->add_control( 'blog_page_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'blog-page' ),
	'section'           => 'blog_page_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'blog_page_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'blog-page' ),
		'recent' 	=> esc_html__( 'Recent', 'blog-page' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'blog_page_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'blog_page_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Blog_Page_Dropdown_Taxonomies_Control( $wp_customize,'blog_page_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'blog-page' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'blog-page' ),
	'section'           => 'blog_page_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'blog_page_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'blog_page_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Blog_Page_Dropdown_Category_Control( $wp_customize,'blog_page_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'blog-page' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'blog-page' ),
	'section'           => 'blog_page_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'blog_page_is_blog_section_content_recent_enable'
) ) );