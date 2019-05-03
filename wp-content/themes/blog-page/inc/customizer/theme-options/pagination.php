<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blog_page_pagination', array(
	'title'               => esc_html__('Pagination','blog-page'),
	'description'         => esc_html__( 'Pagination section options.', 'blog-page' ),
	'panel'               => 'blog_page_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'blog-page' ),
	'section'             => 'blog_page_pagination',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'blog_page_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'blog_page_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'blog-page' ),
	'section'             => 'blog_page_pagination',
	'type'                => 'select',
	'choices'			  => blog_page_pagination_options(),
	'active_callback'	  => 'blog_page_is_pagination_enable',
) );
