<?php
/**
 * Banner Section options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add Banner section
$wp_customize->add_section( 'blog_page_banner_section', array(
	'title'             => esc_html__( 'Banner','blog-page' ),
	'description'       => esc_html__( 'Banner Section options.', 'blog-page' ),
	'panel'             => 'blog_page_front_page_panel',
) );

// Banner content enable control and setting
$wp_customize->add_setting( 'blog_page_theme_options[banner_section_enable]', array(
	'default'			=> 	$options['banner_section_enable'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[banner_section_enable]', array(
	'label'             => esc_html__( 'Banner Section Enable', 'blog-page' ),
	'section'           => 'blog_page_banner_section',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );


// banner pages drop down chooser control and setting
$wp_customize->add_setting( 'blog_page_theme_options[banner_content_page]', array(
	'sanitize_callback' => 'blog_page_sanitize_page',
) );

$wp_customize->add_control( new Blog_Page_Dropdown_Chooser( $wp_customize, 'blog_page_theme_options[banner_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'blog-page' ),
	'section'           => 'blog_page_banner_section',
	'choices'			=> blog_page_page_choices(),
	'active_callback'	=> 'blog_page_is_banner_section_enable',
) ) );
