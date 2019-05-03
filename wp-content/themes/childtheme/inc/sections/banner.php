<?php
/**
 * Banner section
 *
 * This is the template for the content of banner section
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */
if ( ! function_exists( 'blog_page_add_banner_section' ) ) :
    /**
    * Add banner section
    *
    *@since Blog Page 1.0.0
    */
    function blog_page_add_banner_section() {
    	$options = blog_page_get_theme_options();
        // Check if banner is enabled on frontpage
        $banner_enable = apply_filters( 'blog_page_section_status', true, 'banner_section_enable' );

        if ( true !== $banner_enable ) {
            return false;
        }
        // Get banner section details
        $section_details = array();
        $section_details = apply_filters( 'blog_page_filter_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render banner section now.
        blog_page_render_banner_section( $section_details );
    }
endif;

if ( ! function_exists( 'blog_page_get_banner_section_details' ) ) :
    /**
    * banner section details.
    *
    * @since Blog Page 1.0.0
    * @param array $input banner section details.
    */
    function blog_page_get_banner_section_details( $input ) {
        $options = blog_page_get_theme_options(); 
        
        $content = array();
        $page_id = ! empty( $options['banner_content_page'] ) ? $options['banner_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['author']    = blog_page_author();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// banner section content details.
add_filter( 'blog_page_filter_banner_section_details', 'blog_page_get_banner_section_details' );


if ( ! function_exists( 'blog_page_render_banner_section' ) ) :
  /**
   * Start banner section
   *
   * @return string banner content
   * @since Blog Page 1.0.0
   *
   */
   function blog_page_render_banner_section( $content_details = array() ) {
        $options = blog_page_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
            <div id="hero-banner" class="relative" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div class="wrapper">
                    <div class="entry-container">

                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header><!-- .entry-header-->
                    </div><!-- .entry-container -->
                </div><!-- .wrapper -->
            </div><!-- #hero-banner -->

        <?php endforeach;
    }
endif;