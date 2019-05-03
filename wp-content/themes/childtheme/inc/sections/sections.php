<?php
/**
 * Home Page sections
 *
 * This is the template that includes all the other files for home page sections
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

// banner section
require get_template_directory() . '/inc/sections/banner.php';

// featured section
require get_template_directory() . '/inc/sections/featured.php';

// recent articles section
require get_template_directory() . '/inc/sections/recent-articles.php';

// list articles section
require get_template_directory() . '/inc/sections/list-articles.php';

// blog section
require get_template_directory() . '/inc/sections/blog.php';
