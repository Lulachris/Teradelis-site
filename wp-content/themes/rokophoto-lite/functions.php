<?php
/**
 * RokoPhoto functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RokoPhoto
 */

define( 'ROKOPHOTO_VERSION', '1.1.21' );

define( 'ROKOPHOTO_PHP_INCLUDE', get_template_directory() . '/inc' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rokophoto_setup() {

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 750;
	}

	load_theme_textdomain( 'rokophotolite', get_template_directory() . '/languages' );

	// Takes care of the <title> tag.
	add_theme_support( 'title-tag' );

	// Add automatic feed links support. http://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support( 'automatic-feed-links' );

	// Add post thumbnails support. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'thumbnail_portfolio', 650, 650, true );
	add_image_size( 'thumbnail_portfolio_mobile', 450, 400, true );
	add_image_size( 'thumbnail_portfolio_modal', 720, 480, true );
	add_image_size( 'thumbnail_portfolio_modal_mobile', 400, 300, true );

	// Add custom background support. http://codex.wordpress.org/Custom_Backgrounds
	add_theme_support(
		'custom-background', array(
			// Default color
			'default-color' => 'F6F9FA',
		)
	);

	// Add custom header support. http://codex.wordpress.org/Custom_Headers
	add_theme_support(
		'custom-header', array(
			// Defualt image
			'default-image' => get_template_directory_uri() . '/img/01_services.jpg',
			// Header text
			'header-text'   => false,
			'width'         => 1360,
			'height'        => 582,
		)
	);

	// This theme uses wp_nav_menu().
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'rokophoto-lite' ),
		)
	);

	/* woocommerce support */
	add_theme_support( 'woocommerce' );

	add_image_size( 'blog_post_thumbnail', 750, 650, true );

}

add_action( 'after_setup_theme', 'rokophoto_setup' );

/**
 * Enqueue scripts and styles.
 */
function rokophoto_scripts() {
	$rokophoto_disable_animation = get_theme_mod( 'rokophotolite_disable_animation' );

	wp_enqueue_style( 'rokophoto_font', '//fonts.googleapis.com/css?family=Open+Sans:400,600' );
	wp_enqueue_style( 'rokophoto_bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'rokophoto_animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'rokophoto_font_awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'rokophoto_style', get_stylesheet_uri(), array(), ROKOPHOTO_VERSION );
	wp_enqueue_style( 'rokophoto_responsiveness', get_template_directory_uri() . '/css/responsiveness.css' );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'rokophoto_modernizr', get_template_directory_uri() . '/js/modernizr.custom.js' );
	wp_enqueue_script( 'rokophoto-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'rokophoto_bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '', true );
	if ( isset( $rokophoto_disable_animation ) && $rokophoto_disable_animation != 1 ) {
		wp_enqueue_script( 'rokophoto_wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '', true );
	}
	wp_enqueue_script( 'rokophoto_smooth_scroll', get_template_directory_uri() . '/js/SmoothScroll.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_animate_header', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_jqBootstrapValidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'rokophoto_html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js' );
	wp_enqueue_script( 'rokophoto_respond', get_template_directory_uri() . '/js/respond.min.js' );
	wp_script_add_data( 'rokophoto_html5shiv, rokophoto_respond', 'conditional', 'lt IE 9' );
	wp_script_add_data( 'rokophoto_respond', 'conditional', 'lt IE 9' );

	$slider_speed = array(
		'slider_speed' => get_theme_mod( 'rokophotolite_slider_speed', 3000 ),
	);

	wp_localize_script( 'rokophoto_main', 'slider_speed', $slider_speed );

	if ( is_front_page() ) :

		$rokophoto_contact_shortcode = get_theme_mod( 'rokophotolite_contact_shortcode' );
		if ( empty( $rokophoto_contact_shortcode ) ) {
			wp_enqueue_script( 'rokophoto_contact', get_template_directory_uri() . '/js/contact.js', array( 'jquery' ), '', true );

			$site_parameters = array(
				'contact_script' => get_template_directory_uri() . '/inc/submit.php',
				'email_script'   => get_theme_mod( 'rokophotolite_contact_email', get_bloginfo( 'admin_email' ) ),
			);

			wp_localize_script( 'rokophoto_contact', 'SiteParameters', $site_parameters );

		}

	endif;
}

add_action( 'wp_enqueue_scripts', 'rokophoto_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args wp_nav_menu arguments.
 * @return string
 */
function rokophoto_new_setup( $args ) {
	// see wp-includes/nav-menu-template.php for available arguments
	$link = $args['link_before'] .
		'<a href="' . esc_url( home_url( '/' ) ) . '">' .
		$args['before'] . __( 'Home', 'rokophoto-lite' ) . $args['after'] .
		'</a>' .
		$args['link_after'];
	// We have a list
	if ( false !== stripos( $args['items_wrap'], '<ul' ) or false !== stripos( $args['items_wrap'], '<ol' ) ) {
		$link = "<li class='menu-item'>" . $link . '</li>';
	}
	$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );
	if ( ! empty( $args['container'] ) ) {
		$output = '<' . esc_attr( $args['container'] ) . ' class="' . esc_attr( $args['container_class'] ) . '" id="' . esc_attr( $args['container_id'] ) . '">' . wp_kses_post( $output ) . '</' . esc_attr( $args['container'] ) . '>';
	}
	if ( $args['echo'] ) {
		echo $output;
	}
	return $output;
}


/**
 * Display a custom pagination.
 */
function rokophoto_pagination() {

	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul class="pagination">' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );
	}

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) ) {
			echo '<li><span>…</span></li>';
		}
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li><span>…</span></li>' . "\n";
		}

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );
	}

	echo '</ul>' . "\n";

}

/**
 * Custom function to use to open and display each comment.
 *
 * @param integer/string/object $comment Author’s User ID (an integer or string), an E-mail Address (a string) or the comment object from the comment loop.
 * @param array                 $args Comments args.
 * @param int                   $depth Depth of comments.
 */
function rokophoto_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class( 'comment even thread-even' ); ?> id="comment-<?php comment_ID(); ?>">
	<table class="comment-container wow fadeIn">
		<tr>
			<td class="comment-avatar">
				<?php echo get_avatar( $comment, 70 ); ?>
			</td>
			<td class="comment-data">
				<div class="comment-header">
					<span class="comment-author"><?php printf( '%s', get_comment_author_link() ); ?></span>
					<span class="comment-date"><?php echo get_comment_date(); ?> <?php _e( 'on', 'rokophoto-lite' ); ?> <?php echo get_comment_time(); ?></span>
					<?php
					comment_reply_link(
						array_merge(
							$args, array(
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
							)
						)
					);
						?>
				</div>
				<div class="comment-body">
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'rokophoto-lite' ); ?></em><br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
			</td>
		</tr>
	</table>
<?php
}

/**
 * Theme inline style.
 */
function rokophoto_css() {
	if ( is_user_logged_in() ) {
	?>
		<style>
			.comment-login {
				width: 100% !important;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'rokophoto_css' );

/**
 * Change length of excerpt.
 *
 * @param int $length Excerpt length.
 *
 * @return int
 */
function rokophoto_excerpt_length( $length ) {
	global $post;
	if ( $post->post_type == 'portfolio' ) {
		return 15;
	} else {
		return 40;
	}
}
add_filter( 'excerpt_length', 'rokophoto_excerpt_length' );


/**
 * Theme php style.
 */
function rokophoto_php_style() {

	echo ' <style type="text/css">';

		$rokophoto_accent_color = get_theme_mod( 'rokophotolite_accent_color' );

	if ( ! empty( $rokophoto_accent_color ) ) :
		echo ' #vision .carousel-indicators .active,.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus, .widget.widget_search input[type="submit"]:hover { background-color: ' . $rokophoto_accent_color . ';}';
		echo ' #vision .carousel-indicators li, #socials span.follow:hover, #bsocials span.follow:hover, .navbar-default .navbar-toggle, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #review_form #respond .form-submit input:hover, .vision-border:hover > h2, .vision-border:hover, #subscribe span.right:hover, .woocommerce div.product form.cart .button:hover, .woocommerce .products li a.add_to_cart_button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .cart .button:hover, .woocommerce .cart input.button:hover { border-color: ' . $rokophoto_accent_color . ';}';
		echo ' a:hover, #socials span.follow:hover,  #bsocials span.follow:hover, #bsocials a:hover, figure.effect-portfolio:hover h2, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #review_form #respond .form-submit input:hover, .vision-border:hover > h2, .vision-border:hover, #subscribe span.btn:hover, .woocommerce div.product form.cart .button:hover, .woocommerce .products li a.add_to_cart_button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .cart .button:hover, .woocommerce .cart input.button:hover { color: ' . $rokophoto_accent_color . ';}';
	endif;

		$rokophoto_menu_background = get_theme_mod( 'rokophotolite_menu_background' );

	if ( ! empty( $rokophoto_menu_background ) ) :
		echo ' .navbar-default.navbar-shrink { background: ' . $rokophoto_menu_background . ';}';
		endif;

		$rokophoto_menu_color = get_theme_mod( 'rokophotolite_menu_color' );

	if ( ! empty( $rokophoto_menu_color ) ) :
		echo ' .navbar-default .nav li a { color: ' . $rokophoto_menu_color . ';}';
		endif;

		$rokophoto_menu_color_hover = get_theme_mod( 'rokophotolite_menu_color_hover' );

	if ( ! empty( $rokophoto_menu_color_hover ) ) :
		echo ' .navbar-default .nav li a:hover { color: ' . $rokophoto_menu_color_hover . ';}';
		endif;

		$rokophoto_slider_colors_banner_opacity = get_theme_mod( 'rokophotolite_slider_colors_banner_opacity' );

	if ( ! empty( $rokophoto_slider_colors_banner_opacity ) ) :
		echo ' .carousel-content-wrap { background: ' . $rokophoto_slider_colors_banner_opacity . ';}';
		endif;

		$rokophoto_slider_colors_text = get_theme_mod( 'rokophotolite_slider_colors_text' );

	if ( ! empty( $rokophoto_slider_colors_text ) ) :
		echo ' .carousel-caption h1 { color: ' . $rokophoto_slider_colors_text . ';}';
		endif;

		$rokophoto_vision_colors_opacity = get_theme_mod( 'rokophotolite_vision_colors_opacity' );

	if ( ! empty( $rokophoto_vision_colors_opacity ) ) :
		echo ' #vision #carousel-example-generic { background: ' . $rokophoto_vision_colors_opacity . ';}';
		endif;

		$rokophoto_vision_colors_text = get_theme_mod( 'rokophotolite_vision_colors_text' );

	if ( ! empty( $rokophoto_vision_colors_text ) ) :
		echo ' #vision .vision-border { color: ' . $rokophoto_vision_colors_text . '; border: 2px solid ' . $rokophoto_vision_colors_text . '; }';
		endif;

		$rokophoto_portfolio_header_background = get_theme_mod( 'rokophotolite_portfolio_header_background' );

	if ( ! empty( $rokophoto_portfolio_header_background ) ) :
		echo ' .light-overlay { background: ' . $rokophoto_portfolio_header_background . '; }';
		endif;

		$rokophoto_portfolio_text = get_theme_mod( 'rokophotolite_portfolio_text' );

	if ( ! empty( $rokophoto_portfolio_text ) ) :
		echo ' .ptitle { color: ' . $rokophoto_portfolio_text . '; }';
		endif;

		$rokophoto_ribbon_background = get_theme_mod( 'rokophotolite_ribbon_background' );

	if ( ! empty( $rokophoto_ribbon_background ) ) :
		echo ' #subscribe { background: ' . $rokophoto_ribbon_background . '; }';
		endif;

		$rokophoto_ribbon_text_color = get_theme_mod( 'rokophotolite_ribbon_text_color' );

	if ( ! empty( $rokophoto_ribbon_text_color ) ) :
		echo ' #subscribe { color: ' . $rokophoto_ribbon_text_color . '; }';
		echo ' #subscribe span.right { color: ' . $rokophoto_ribbon_text_color . '; border: 1px solid ' . $rokophoto_ribbon_text_color . '; }';
		endif;

		$rokophoto_ribbon_text_color_hover = get_theme_mod( 'rokophotolite_ribbon_text_color_hover' );

	if ( ! empty( $rokophoto_ribbon_text_color_hover ) ) :
		echo ' #subscribe span.right:hover { color: ' . $rokophoto_ribbon_text_color_hover . '; border: 1px solid ' . $rokophoto_ribbon_text_color_hover . '; }';
		endif;

		$rokophoto_about_text = get_theme_mod( 'rokophotolite_about_text' );

	if ( ! empty( $rokophoto_about_text ) ) :
		echo ' #about { color: ' . $rokophoto_about_text . '; }';
		echo ' #about h2 { border: 2px solid ' . $rokophoto_about_text . '; }';
		endif;

		$rokophoto_contact_background = get_theme_mod( 'rokophotolite_contact_background' );

	if ( ! empty( $rokophoto_contact_background ) ) :
		echo ' #footer, section#contact { background: ' . $rokophoto_contact_background . '; }';
		endif;

		$rokophoto_contact_text = get_theme_mod( 'rokophotolite_contact_text' );

	if ( ! empty( $rokophoto_contact_text ) ) :
		echo ' #footer h2 { color: ' . $rokophoto_contact_text . '; border: 2px solid' . $rokophoto_contact_text . ';  }';
		echo ' #footer p, #footer .contact-footer-email a, #footer .contact-footer-website a { color: ' . $rokophoto_contact_text . '; }';
		echo ' #contact .form-control { color: ' . $rokophoto_contact_text . '; border: 1px solid ' . $rokophoto_contact_text . '; }';
		echo ' #contact .btn { color: ' . $rokophoto_contact_text . '; border: 2px solid' . $rokophoto_contact_text . ';  }';
		endif;

		$rokophoto_contact_text_placeholder = get_theme_mod( 'rokophotolite_contact_text_placeholder' );

	if ( ! empty( $rokophoto_contact_text_placeholder ) ) :
		echo ' #contact .form-control::-webkit-input-placeholder { color: ' . $rokophoto_contact_text_placeholder . '; }';
		echo ' #contact .form-control::-moz-placeholder { color: ' . $rokophoto_contact_text_placeholder . '; }';
		echo ' #contact .form-control:-moz-placeholder { color: ' . $rokophoto_contact_text_placeholder . '; }';
		echo ' #contact .form-control:-ms-input-placeholder { color: ' . $rokophoto_contact_text_placeholder . '; }';
		endif;

		$rokophoto_contact_button_hover = get_theme_mod( 'rokophotolite_contact_button_hover' );

	if ( ! empty( $rokophoto_contact_button_hover ) ) :
		echo ' #footer h2:hover { color: ' . $rokophoto_contact_button_hover . '; border: 2px solid' . $rokophoto_contact_button_hover . ';  }';
		echo ' #contact .form-control:hover, section#contact .form-control:focus { border: 1px solid ' . $rokophoto_contact_button_hover . '; }';
		echo ' #contact .btn:hover, #contact .btn:focus { color: ' . $rokophoto_contact_button_hover . '; border: 2px solid' . $rokophoto_contact_button_hover . ';  }';
		echo ' section#contact .text-danger { color: ' . $rokophoto_contact_button_hover . '; }';
		endif;

	echo '</style>';

}
add_action( 'wp_print_scripts', 'rokophoto_php_style' );

/**
 * Widget initialization.
 */
function rokophoto_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar top', 'rokophoto-lite' ),
			'id'            => 'rokophoto-sidebar-top',
			'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'rokophoto-lite' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Sidebar bottom', 'rokophoto-lite' ),
			'id'            => 'rokophoto-sidebar-bottom',
			'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'rokophoto-lite' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rokophoto_widgets_init' );

/**
 * Ajax request
 */
function rokophoto_requestpost() {
	if ( ! empty( $_POST['ids'] ) ) {
		$rokophoto_encoded_ids = stripslashes( $_POST['ids'] );
		if ( ! empty( $rokophoto_encoded_ids ) ) {
			$rokophoto_ids = json_decode( $rokophoto_encoded_ids, true );
			if ( ! empty( $rokophoto_ids ) ) {
				$links = array();
				foreach ( $rokophoto_ids as $post_id ) {
					$post_link = get_permalink( $post_id );
					array_push( $links, $post_link );
				}
				echo json_encode( $links );
			}
		}
	}
	die();
}
add_action( 'wp_ajax_nopriv_request_post', 'rokophoto_requestpost' );
add_action( 'wp_ajax_request_post', 'rokophoto_requestpost' );

/**
 * Define Allowed Files to be included
 *
 * @param array $array all files from /inc folder.
 *
 * @return array
 */
function rokophoto_filter_phpfiles( $array ) {
	return array_merge(
		$array, array(
			'/customizer/customizer-theme-info',
			'/customizer/customizer-text-controls',
			'/customizer/customizer-pro-manager',
			'/customizer/customizer-site-logo',
			'/customizer/customizer-loading-animations',
			'/customizer/customizer-misc-colors',
			'/customizer/customizer-subheader',
			'/customizer/customizer-footer',
			'/customizer/customizer-footer-credits',
			'/customizer/customizer-frontpage-slider',
			'/customizer/customizer-frontpage-vision',
			'/customizer/customizer-frontpage-portfolio',
			'/customizer/customizer-frontpage-ribbon',
			'/customizer/customizer-frontpage-about',
			'/customizer/customizer-frontpage-contact',

			'/class/upsell/class-customizer-info-singleton',
		)
	);
}
add_filter( 'rokophoto_filter_phpfiles', 'rokophoto_filter_phpfiles' );

/**
 * Include features files.
 */
function rokophoto_include_files() {
	$rokophoto_inc_dir      = rtrim( ROKOPHOTO_PHP_INCLUDE, '/' );
	$rokophoto_allowed_phps = array();
	$rokophoto_allowed_phps = apply_filters( 'rokophoto_filter_phpfiles', $rokophoto_allowed_phps );
	foreach ( $rokophoto_allowed_phps as $file ) {
		$rokophoto_file_to_include = $rokophoto_inc_dir . $file . '.php';
		if ( file_exists( $rokophoto_file_to_include ) ) {
			include_once( $rokophoto_file_to_include );
		}
	}
}
add_action( 'after_setup_theme', 'rokophoto_include_files' );

if ( file_exists( get_template_directory() . '/class-tgm-plugin-activation.php' ) ) {
	/* tgm-plugin-activation */
	require_once get_template_directory() . '/class-tgm-plugin-activation.php';

	/**
	 * TGM required plugins
	 */
	function rokophoto_register_required_plugins() {

		$plugins = array(
			array(
				'name'     => 'Orbit Fox',
				'slug'     => 'themeisle-companion',
				'required' => false,
			),
		);

		$config = array(
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'rokophoto_register_required_plugins' );
}
