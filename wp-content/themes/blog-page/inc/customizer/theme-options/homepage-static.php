<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Blog Page
* @since Blog Page 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'blog_page_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'blog_page_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'blog-page' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'blog-page' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );