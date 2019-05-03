<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 * @return array An array of default values
 */

function blog_page_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$blog_page_default_options = array(
		// Color Options
		'header_title_color'			=> '#ff696a',
		'header_tagline_color'			=> '#322d2d',
		'header_txt_logo_extra'			=> 'show-all',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'nav_search_enable'				=> true,
		'subscription_enable'			=> false,

		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'blog-page' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'Banner,Featured,Recent Articles,Popular Articles,List Articles,Blog',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Accueil', 'blog-page' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,
		'hide_author'					=> false,


		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Banner
		'banner_section_enable'			=> true,

		// featured
		'featured_section_enable'		=> true,


		// recent_articles
		'recent_articles_section_enable' => true,
		'recent_articles_title'			=> esc_html__( 'Recent Articles', 'blog-page' ),

		// list_articles
		'list_articles_section_enable' 	=> true,
		'list_articles_title'			=> esc_html__( 'Photography Articles', 'blog-page' ),
		'list_articles_readmore'		=> esc_html__( 'Continue Reading', 'blog-page' ), 

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'Lifestyle And Fashion', 'blog-page' ),


	);

	$output = apply_filters( 'blog_page_default_theme_options', $blog_page_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}