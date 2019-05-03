<?php
/**
 * Recent Articles section
 *
 * This is the template for the content of recent articles section
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */
if ( ! function_exists( 'blog_page_add_recent_articles_section' ) ) :
    /**
    * Add recent articles section
    *
    *@since Blog Page 1.0.0
    */
    function blog_page_add_recent_articles_section() {
    	$options = blog_page_get_theme_options();
        // Check if recent articles is enabled on frontpage
        $recent_articles_enable = apply_filters( 'blog_page_section_status', true, 'recent_articles_section_enable' );

        if ( true !== $recent_articles_enable ) {
            return false;
        }
        // Get recent articles section details
        $section_details = array();
        $section_details = apply_filters( 'blog_page_filter_recent_articles_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render recent articles section now.
        blog_page_render_recent_articles_section( $section_details );
    }
endif;

if ( ! function_exists( 'blog_page_get_recent_articles_section_details' ) ) :
    /**
    * recent articles section details.
    *
    * @since Blog Page 1.0.0
    * @param array $input recent articles section details.
    */
    function blog_page_get_recent_articles_section_details( $input ) {
        $options = blog_page_get_theme_options();
        
        $content = array();
                $cat_id = ! empty( $options['recent_articles_content_category'] ) ? $options['recent_articles_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 6,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );           


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['author']    = blog_page_author();
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

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
// recent articles section content details.
add_filter( 'blog_page_filter_recent_articles_section_details', 'blog_page_get_recent_articles_section_details' );


if ( ! function_exists( 'blog_page_render_recent_articles_section' ) ) :
  /**
   * Start recent articles section
   *
   * @return string recent articles content
   * @since Blog Page 1.0.0
   *
   */
   function blog_page_render_recent_articles_section( $content_details = array() ) {
        $options = blog_page_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="recent" class="page-section no-padding-top">
            <div class="wrapper">
                <?php if ( ! empty( $options['recent_articles_title'] ) || ! empty( $options['recent_articles_subtitle'] ) ) : ?>
                    <div class="section-header">
                        <?php if ( ! empty( $options['recent_articles_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['recent_articles_title'] ); ?></h2>
                        <?php endif; ?>
                        <div class="seperator"></div>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div id="infinite-post-wrap" class="post-archive half grid col-3 ">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="grid-item hentry <?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail popular">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                </div><!-- .post-thumbnail -->
                            <?php endif; ?>

                            <div class="entry-container">

                                    <span class="cat-links">
                                        <?php the_category( ', ', '', $content['id'] ); ?>
                                    </span>
                             
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                    <div class="entry-meta">
                                        <?php  
                                            echo wp_kses_post( $content['author'] );
                                            blog_page_posted_on( $content['id'] );
                                        ?>
                                    </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- #infinite-post-wrap -->
            </div><!-- .wrapper -->
        </div><!-- #recent -->
        
    <?php }
endif;