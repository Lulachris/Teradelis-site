<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

/**
 * blog_page_footer_primary_content hook
 *
 * @hooked blog_page_add_subscribe_section -  10
 *
 */
do_action( 'blog_page_footer_primary_content' );

/**
 * blog_page_content_end_action hook
 *
 * @hooked blog_page_content_end -  10
 *
 */
do_action( 'blog_page_content_end_action' );

/**
 * blog_page_content_end_action hook
 *
 * @hooked blog_page_footer_start -  10
 * @hooked Blog_Page_Footer_Widgets->add_footer_widgets -  20
 * @hooked blog_page_footer_site_info -  40
 * @hooked blog_page_footer_end -  100
 *
 */
do_action( 'blog_page_footer' );

/**
 * blog_page_page_end_action hook
 *
 * @hooked blog_page_page_end -  10
 *
 */
do_action( 'blog_page_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
