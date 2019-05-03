<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

$wp_customize->add_section( 'blog_page_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','blog-page' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'blog-page' ),
	'panel'             => 'blog_page_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'blog-page' ),
	'section'          	=> 'blog_page_breadcrumb',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'blog_page_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'blog-page' ),
	'active_callback' 	=> 'blog_page_is_breadcrumb_enable',
	'section'          	=> 'blog_page_breadcrumb',
) );
