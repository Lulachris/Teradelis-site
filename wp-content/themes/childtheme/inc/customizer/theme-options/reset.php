<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'blog_page_reset_section', array(
	'title'             => esc_html__('Reset all settings','blog-page'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'blog-page' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'blog_page_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'blog_page_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'blog_page_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'blog-page' ),
	'section'           => 'blog_page_reset_section',
	'type'              => 'checkbox',
) );
