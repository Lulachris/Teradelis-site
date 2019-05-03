<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function blog_page_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blog-page' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'blog_page_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function blog_page_site_layout() {
        $blog_page_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'blog_page_site_layout', $blog_page_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'blog_page_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function blog_page_selected_sidebar() {
        $blog_page_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'blog-page' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'blog-page' ),
            );
        $output = apply_filters( 'blog_page_selected_sidebar', $blog_page_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'blog_page_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function blog_page_global_sidebar_position() {
        $blog_page_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'blog_page_global_sidebar_position', $blog_page_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'blog_page_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function blog_page_sidebar_position() {
        $blog_page_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',

        );

        $output = apply_filters( 'blog_page_sidebar_position', $blog_page_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'blog_page_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function blog_page_pagination_options() {
        $blog_page_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'blog-page' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'blog-page' ),
        );

        $output = apply_filters( 'blog_page_pagination_options', $blog_page_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'blog_page_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blog_page_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blog-page' ),
            'off'       => esc_html__( 'Disable', 'blog-page' )
        );
        return apply_filters( 'blog_page_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'blog_page_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blog_page_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'blog-page' ),
            'off'       => esc_html__( 'No', 'blog-page' )
        );
        return apply_filters( 'blog_page_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'blog_page_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function blog_page_sortable_sections() {
        $sections = array(
            'banner'    => esc_html__( 'Banner', 'blog-page' ),
            'featured'  => esc_html__( 'Featured', 'blog-page' ),
            'recent_articles'  => esc_html__( 'Recent Articles', 'blog-page' ),
            'list_articles' => esc_html__( 'List Articles', 'blog-page' ),
            'blog'      => esc_html__( 'Blog', 'blog-page' ),
        );
        return apply_filters( 'blog_page_sortable_sections', $sections );
    }
endif;
