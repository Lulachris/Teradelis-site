<?php
/**
 * Blog Page Customizer.
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_page_customize_register( $wp_customize ) {
	$options = blog_page_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'blog_page_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_page_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'blog-page' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'blog_page_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_page_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'blog-page' ),
		'section'           => 'colors',
	) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'blog_page_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'blog_page_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'blog_page_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'blog-page' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'blog-page' ),
			'show-all'     => esc_html__( 'Show All', 'blog-page' ),
			'title-only'   => esc_html__( 'Title Only', 'blog-page' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'blog-page' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'blog-page' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'blog-page' ),
			)
	) );

	// Add panel for common theme options
	$wp_customize->add_panel( 'blog_page_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','blog-page' ),
	    'description'=> esc_html__( 'Blog Page Theme Options.', 'blog-page' ),
	    'priority'   => 150,
	) );
	
	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'blog_page_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','blog-page' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'blog-page' ),
	    'priority'   => 140,
	) );

	// load banner option
	require get_template_directory() . '/inc/customizer/sections/banner.php';

	// load featured option
	require get_template_directory() . '/inc/customizer/sections/featured.php';

	// load recent articles option
	require get_template_directory() . '/inc/customizer/sections/recent-articles.php';

	// load list articles option
	require get_template_directory() . '/inc/customizer/sections/list-articles.php';

	// load blog option
	require get_template_directory() . '/inc/customizer/sections/blog.php';

}
add_action( 'customize_register', 'blog_page_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_page_customize_preview_js() {
	wp_enqueue_script( 'blog-page-customizer', get_template_directory_uri() . '/assets/js/customizer' . blog_page_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_page_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function blog_page_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . blog_page_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . blog_page_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'blog-page-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . blog_page_min() . '.css' );
	wp_enqueue_script( 'blog-page-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . blog_page_min() . '.js', array(), '1.0', true );
	$blog_page_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'blog-page' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'blog-page-customize-controls', 'blog_page_reset_data', $blog_page_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'blog_page_customize_control_js' );

if ( !function_exists( 'blog_page_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Blog Page 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function blog_page_reset_options() {
		$options = blog_page_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'blog_page_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'blog_page_reset_options' );
