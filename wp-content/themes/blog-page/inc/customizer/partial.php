<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Blog Page
* @since Blog Page 1.0.0
*/

if ( ! function_exists( 'blog_page_recent_articles_title_partial' ) ) :
    // recent_articles title
    function blog_page_recent_articles_title_partial() {
        $options = blog_page_get_theme_options();
        return esc_html( $options['recent_articles_title'] );
    }
endif;

if ( ! function_exists( 'blog_page_list_articles_title_partial' ) ) :
    // list_articles title
    function blog_page_list_articles_title_partial() {
        $options = blog_page_get_theme_options();
        return esc_html( $options['list_articles_title'] );
    }
endif;


if ( ! function_exists( 'blog_page_blog_title_partial' ) ) :
    // blog title
    function blog_page_blog_title_partial() {
        $options = blog_page_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

