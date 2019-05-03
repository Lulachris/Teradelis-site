<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blog_page_layout', array(
	'title'               => esc_html__('Layout','blog-page'),
	'description'         => esc_html__( 'Layout section options.', 'blog-page' ),
	'panel'               => 'blog_page_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[site_layout]', array(
	'sanitize_callback'   => 'blog_page_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Blog_Page_Custom_Radio_Image_Control ( $wp_customize, 'blog_page_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'blog-page' ),
	'section'             => 'blog_page_layout',
	'choices'			  => blog_page_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'blog_page_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Blog_Page_Custom_Radio_Image_Control ( $wp_customize, 'blog_page_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'blog-page' ),
	'section'             => 'blog_page_layout',
	'choices'			  => blog_page_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'blog_page_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Blog_Page_Custom_Radio_Image_Control ( $wp_customize, 'blog_page_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'blog-page' ),
	'section'             => 'blog_page_layout',
	'choices'			  => blog_page_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'blog_page_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Blog_Page_Custom_Radio_Image_Control( $wp_customize, 'blog_page_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'blog-page' ),
	'section'             => 'blog_page_layout',
	'choices'			  => blog_page_sidebar_position(),
) ) );