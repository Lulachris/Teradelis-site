<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'blog_page_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'blog-page' ),
		'priority'   			=> 900,
		'panel'      			=> 'blog_page_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'blog_page_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'blog_page_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'blog_page_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'blog-page' ),
		'section'    			=> 'blog_page_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blog_page_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'blog_page_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'blog_page_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'blog_page_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'blog_page_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Page_Switch_Control( $wp_customize, 'blog_page_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'blog-page' ),
		'section'    			=> 'blog_page_section_footer',
		'on_off_label' 		=> blog_page_switch_options(),
    )
) );