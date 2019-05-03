<?php
/**
 * Featured section
 *
 * This is the template for the content of featured section
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */
if ( ! function_exists( 'blog_page_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since Blog Page 1.0.0
    */
    function blog_page_add_featured_section() {
    	$options = blog_page_get_theme_options();
        // Check if featured is enabled on frontpage
        $featured_enable = apply_filters( 'blog_page_section_status', true, 'featured_section_enable' );

        if ( true !== $featured_enable ) {
            return false;
        }
        // Get featured section details
        $section_details = array();
        $section_details = apply_filters( 'blog_page_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render featured section now.
        blog_page_render_featured_section( $section_details );
    }
endif;

if ( ! function_exists( 'blog_page_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Blog Page 1.0.0
    * @param array $input featured section details.
    */
    function blog_page_get_featured_section_details( $input ) {
        $options = blog_page_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['featured_content_page_' . $i] ) )
                $page_ids[] = $options['featured_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

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
// featured section content details.
add_filter( 'blog_page_filter_featured_section_details', 'blog_page_get_featured_section_details' );


if ( ! function_exists( 'blog_page_render_featured_section' ) ) :
  /**
   * Start featured section
   *
   * @return string featured content
   * @since Blog Page 1.0.0
   *
   */
   function blog_page_render_featured_section( $content_details = array() ) {
        $options = blog_page_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="about-me" class="page-section col-3">
            <div class="wrapper">
                <div class="about-wrapper">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="featured-image" style>
                               <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                <div class="inner-border"></div>
                            </div><!-- .featured-image -->

                            <div class="featured-content">
                                <span><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></span>
                            </div><!-- .featured-content -->
                        </article><!-- .hentry -->
                    <?php endforeach; ?>
                </div><!-- .about-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #about-me -->
        
    <?php }
endif;