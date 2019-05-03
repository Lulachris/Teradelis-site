<?php
/**
 * Featured Section options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add Featured section
$wp_customize->add_section( 'blog_page_featured_section', array(
	'title'             => esc_html__( 'Featured','blog-page' ),
	'description'       => esc_html__( 'Featured Section options.', 'blog-page' ),
	'panel'             => 'blog_page_front_page_panel',
) );

// Featured content enable control and setting
$wp_customize->add_setting( 'blog_page_theme_options[featured_section_enable]', array(
	'default'			=> 	$options['featured_section_enable'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[featured_section_enable]', array(
	'label'             => esc_html__( 'Featured Section Enable', 'blog-page' ),
	'section'           => 'blog_page_featured_section',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );


for ( $i = 1; $i <= 3; $i++ ) :

	// featured pages drop down chooser control and setting
	$wp_customize->add_setting( 'blog_page_theme_options[featured_content_page_' . $i . ']', array(
		'sanitize_callback' => 'blog_page_sanitize_page',
	) );

	$wp_customize->add_control( new Blog_Page_Dropdown_Chooser( $wp_customize, 'blog_page_theme_options[featured_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'blog-page' ), $i ),
		'section'           => 'blog_page_featured_section',
		'choices'			=> blog_page_page_choices(),
		'active_callback'	=> 'blog_page_is_featured_section_enable',
	) ) );

endfor;
