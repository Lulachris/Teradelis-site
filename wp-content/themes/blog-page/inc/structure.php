<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

$options = blog_page_get_theme_options();


if ( ! function_exists( 'blog_page_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Blog Page 1.0.0
	 */
	function blog_page_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'blog_page_doctype', 'blog_page_doctype', 10 );


if ( ! function_exists( 'blog_page_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'blog_page_before_wp_head', 'blog_page_head', 10 );

if ( ! function_exists( 'blog_page_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blog-page' ); ?></a>

		<?php
	}
endif;
add_action( 'blog_page_page_start_action', 'blog_page_page_start', 10 );

if ( ! function_exists( 'blog_page_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'blog_page_page_end_action', 'blog_page_page_end', 10 );

if ( ! function_exists( 'blog_page_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_header_start() { ?>
        <div class="menu-overlay"></div>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
			 	<div id="site-menu">
		<?php
	}
endif;
add_action( 'blog_page_header_action', 'blog_page_header_start', 10 );

if ( ! function_exists( 'blog_page_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_site_branding() {
		$options  = blog_page_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-branding">
			<div class="site-branding-wrapper">
				<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
				<?php } 
				if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
					<div id="site-details">
						<?php
						if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
							if ( blog_page_is_latest_posts() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						} 
						if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
							<?php
							endif; 
						}?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding-wrapper -->
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'blog_page_header_action', 'blog_page_site_branding', 20 );

if ( ! function_exists( 'blog_page_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_site_navigation() { 
		$options = blog_page_get_theme_options();
		?>
		<button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
			<span class="menu-label"><?php esc_html_e( 'Menu', 'blog-page' ); ?></span>
			<?php
			echo blog_page_get_svg( array( 'icon' => 'down', 'class' => 'icon-menu' ) );
			?>					
		</button>
		<nav id="secondary-navigation" class="secondary-navigation main-navigate" role="navigation">
			<?php  
        		$defaults = array(
        			'theme_location' => 'secondary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'secondary-menu',
        			'echo' => true,
        			'fallback_cb' => 'blog_page_menu_fallback_cb',
        		);
        	
        		wp_nav_menu( $defaults );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'blog_page_header_action', 'blog_page_site_navigation', 30 );



if ( ! function_exists( 'blog_page_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_header_end() {
		?>
			</div><!-- .site-menu -->
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'blog_page_header_action', 'blog_page_header_end', 40 );

if ( ! function_exists( 'blog_page_primary_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_primary_site_navigation() {
		$options = blog_page_get_theme_options();
		?>
	    		</div><!-- #site-navigation -->
			</div><!-- #navigation-menu -->
		<?php
	}
endif;
add_action( 'blog_page_header_action', 'blog_page_primary_site_navigation', 50 );

if ( ! function_exists( 'blog_page_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'blog_page_content_start_action', 'blog_page_content_start', 10 );

if ( ! function_exists( 'blog_page_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_header_image() {
		if ( blog_page_is_frontpage() )
			return;
		$header_image = get_header_image();
		if ( is_singular() ) :
			$header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <h2 class="page-title"><?php echo blog_page_custom_header_banner_title(); ?></h2>
                </header>

                <?php blog_page_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

	<?php
	}
endif;
add_action( 'blog_page_header_image_action', 'blog_page_header_image', 10 );

if ( ! function_exists( 'blog_page_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Blog Page 1.0.0
	 */
	function blog_page_add_breadcrumb() {
		$options = blog_page_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( blog_page_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * blog_page_simple_breadcrumb hook
				 *
				 * @hooked blog_page_simple_breadcrumb -  10
				 *
				 */
				do_action( 'blog_page_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'blog_page_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'blog_page_content_end_action', 'blog_page_content_end', 10 );

if ( ! function_exists( 'blog_page_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'blog_page_footer', 'blog_page_footer_start', 10 );

if ( ! function_exists( 'blog_page_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = blog_page_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		$powered_by_text = esc_html__( 'All Rights Reserved | ', 'blog-page' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'blog-page' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';

		?>
		<div class="site-info col-2">
                <div class="wrapper">
                    <span>
                    	<?php 
                    	echo blog_page_santize_allow_tag( $copyright_text ); 
                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
                    	?>
                	</span>
                    <span><?php echo blog_page_santize_allow_tag( $powered_by_text ); ?></span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'blog_page_footer', 'blog_page_footer_site_info', 40 );

if ( ! function_exists( 'blog_page_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_footer_scroll_to_top() {
		$options  = blog_page_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo blog_page_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'blog_page_footer', 'blog_page_footer_scroll_to_top', 40 );

if ( ! function_exists( 'blog_page_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Blog Page 1.0.0
	 *
	 */
	function blog_page_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'blog_page_footer', 'blog_page_footer_end', 100 );



