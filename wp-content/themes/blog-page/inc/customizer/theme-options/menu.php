<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blog_page_menu', array(
	'title'             => esc_html__('Header Menu','blog-page'),
	'description'       => esc_html__( 'Header Menu options.', 'blog-page' ),
	'panel'             => 'nav_menus',
) );

// search enable setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[nav_search_enable]', array(
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
	'default'           => $options['nav_search_enable'],
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[nav_search_enable]', array(
	'label'             => esc_html__( 'Enable search', 'blog-page' ),
	'section'           => 'blog_page_menu',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );
