<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Blog Page
	 * @since Blog Page 1.0.0
	 */

	/**
	 * blog_page_doctype hook
	 *
	 * @hooked blog_page_doctype -  10
	 *
	 */
	do_action( 'blog_page_doctype' );

?>
<head>
<?php
	/**
	 * blog_page_before_wp_head hook
	 *
	 * @hooked blog_page_head -  10
	 *
	 */
	do_action( 'blog_page_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * blog_page_page_start_action hook
	 *
	 * @hooked blog_page_page_start -  10
	 *
	 */
	do_action( 'blog_page_page_start_action' ); 

	/**
	 * blog_page_loader_action hook
	 *
	 * @hooked blog_page_loader -  10
	 *
	 */
	do_action( 'blog_page_before_header' );

	/**
	 * blog_page_header_action hook
	 *
	 * @hooked blog_page_header_start -  10
	 * @hooked blog_page_site_branding -  20
	 * @hooked blog_page_site_navigation -  30
	 * @hooked blog_page_header_end -  50
	 *
	 */
	do_action( 'blog_page_header_action' );

	/**
	 * blog_page_content_start_action hook
	 *
	 * @hooked blog_page_content_start -  10
	 *
	 */
	do_action( 'blog_page_content_start_action' );

	/**
	 * blog_page_header_image_action hook
	 *
	 * @hooked blog_page_header_image -  10
	 *
	 */
	do_action( 'blog_page_header_image_action' );

    if ( blog_page_is_frontpage() ) {

    	$sections = blog_page_sortable_sections();
    	$i=1;
		foreach ( $sections as $section => $value ) {
			add_action( 'blog_page_primary_content', 'blog_page_add_'. $section .'_section', $i . 0);
			$i++;
		}
		do_action( 'blog_page_primary_content' );
	}