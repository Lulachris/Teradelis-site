<?php

if ( ! function_exists( 'winterblues_setup' ) ) :

  function winterblues_setup() {

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_editor_style();

    add_theme_support( 'custom-header', apply_filters( 'winterblues_custom_header_args', array(
      'default-image' => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
      'flex-width'    => true,
      'width'         => 1920,
      'flex-height'   => true,
      'height'        => 480,
    ) ) );

    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'winterblues_custom_background_args', array(
      'default-color' => 'fff',
      'default-image' => '',
    ) ) );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );

    register_nav_menu( 'nl-header', __( 'Main', 'winter-blues' ) );

  }
endif;
add_action( 'after_setup_theme', 'winterblues_setup' );

function winterblues_menu_settings() {
  wp_nav_menu( array(
    'theme_location'  => 'nl-header',
    'depth' => 1,
  ));
}

function winterblues_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'winterblues_content_width', 640 );
}
add_action( 'after_setup_theme', 'winterblues_content_width', 0 );

function winterblues_scripts() {

  $dir = get_template_directory_uri();

  wp_enqueue_style(
    'google-fonts', add_query_arg(
      array(
        'family' => ( 'Lato:300,400,700,900|Lora:400,400i,700,700i' ),
        'subset' => ( 'latin,latin-ext,cyrillic' ),
      ), '//fonts.googleapis.com/css'
  ));

	wp_enqueue_style( 'winterblues-main-style', get_stylesheet_uri() );

	wp_enqueue_script( 'winterblues-main-script', $dir . '/assets/js/script.min.js', array(), null, true );
	wp_register_script( 'fontawesome', $dir . '/assets/js/fontawesome.min.js', array(), null, true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'winterblues_scripts' );

function winterblues_widgets() {
  register_sidebar( array(
    'name' => __( 'Sidebar', 'winter-blues' ),
    'id' => 'nl-sidebar',
    'description' => __( 'Right sidebar of the template', 'winter-blues' ),
  ));
}
add_action( 'widgets_init', 'winterblues_widgets' );

function winterblues_nav() {
  wp_nav_menu( array(
    'theme_location'  => 'nl-header',
    'menu_id' => 'menu',
    'depth' => 1,
    'container' => 'div',
    'container_id' => 'zero'
  ));
}

if ( ! is_admin() ) {
	function winterblues_excerpt_length( $length ) {
	  return 18;
	}
	add_filter( 'excerpt_length', 'winterblues_excerpt_length', 999 );
}

function winterblues_excerpt_more( $more ) {
  return __('...', 'winter-blues');
}
add_filter( 'excerpt_more', 'winterblues_excerpt_more' );

require get_parent_theme_file_path( '/inc/widgets/nl-social.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
