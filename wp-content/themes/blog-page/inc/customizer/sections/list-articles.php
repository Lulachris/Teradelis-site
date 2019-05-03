<?php
/**
 * List Articles Section options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Add List Articles section
$wp_customize->add_section( 'blog_page_list_articles_section', array(
	'title'             => esc_html__( 'List Articles','blog-page' ),
	'description'       => esc_html__( 'List Articles Section options.', 'blog-page' ),
	'panel'             => 'blog_page_front_page_panel',
) );

// List Articles content enable control and setting
$wp_customize->add_setting( 'blog_page_theme_options[list_articles_section_enable]', array(
	'default'			=> 	$options['list_articles_section_enable'],
	'sanitize_callback' => 'blog_page_sanitize_switch_control',
) );

$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[list_articles_section_enable]', array(
	'label'             => esc_html__( 'List Articles Section Enable', 'blog-page' ),
	'section'           => 'blog_page_list_articles_section',
	'on_off_label' 		=> blog_page_switch_options(),
) ) );

// list articles title setting and control
$wp_customize->add_setting( 'blog_page_theme_options[list_articles_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['list_articles_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'blog_page_theme_options[list_articles_title]', array(
	'label'           	=> esc_html__( 'Title', 'blog-page' ),
	'section'        	=> 'blog_page_list_articles_section',
	'active_callback' 	=> 'blog_page_is_list_articles_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blog_page_theme_options[list_articles_title]', array(
		'selector'            => '#photography .section-header h2.section-title',
		'settings'            => 'blog_page_theme_options[list_articles_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'blog_page_list_articles_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'blog_page_theme_options[list_articles_content_category]', array(
	'sanitize_callback' => 'blog_page_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Blog_Page_Dropdown_Taxonomies_Control( $wp_customize,'blog_page_theme_options[list_articles_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'blog-page' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'blog-page' ),
	'section'           => 'blog_page_list_articles_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'blog_page_is_list_articles_section_enable'
) ) );

// list articles readmore text  setting and control
$wp_customize->add_setting( 'blog_page_theme_options[list_articles_readmore]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['list_articles_readmore'],
) );

$wp_customize->add_control( 'blog_page_theme_options[list_articles_readmore]', array(
	'label'           	=> esc_html__( 'Read More Text', 'blog-page' ),
	'section'        	=> 'blog_page_list_articles_section',
	'active_callback' 	=> 'blog_page_is_list_articles_section_enable',
	'type'				=> 'text',
) );
