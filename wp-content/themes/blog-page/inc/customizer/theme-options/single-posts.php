<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'blog_page_single_post_section', array(
	'title'             => esc_html__( 'Single Post','blog-page' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'blog-page' ),
	'panel'             => 'blog_page_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'blog-page' ),
	'section'           => 'blog_page_single_post_section',
	'on_off_label' 		=> blog_page_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'blog-page' ),
	'section'           => 'blog_page_single_post_section',
	'on_off_label' 		=> blog_page_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'blog-page' ),
	'section'           => 'blog_page_single_post_section',
	'on_off_label' 		=> blog_page_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'blog-page' ),
	'section'           => 'blog_page_single_post_section',
	'on_off_label' 		=> blog_page_hide_options(),
) ) );
