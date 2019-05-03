<?php
/**
 * List Articles section
 *
 * This is the template for the content of list articles section
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */
if ( ! function_exists( 'blog_page_add_list_articles_section' ) ) :
    /**
    * Add list articles section
    *
    *@since Blog Page 1.0.0
    */
    function blog_page_add_list_articles_section() {
    	$options = blog_page_get_theme_options();
        // Check if list articles is enabled on frontpage
        $list_articles_enable = apply_filters( 'blog_page_section_status', true, 'list_articles_section_enable' );

        if ( true !== $list_articles_enable ) {
            return false;
        }
        // Get list articles section details
        $section_details = array();
        $section_details = apply_filters( 'blog_page_filter_list_articles_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render list articles section now.
        blog_page_render_list_articles_section( $section_details );
    }
endif;

if ( ! function_exists( 'blog_page_get_list_articles_section_details' ) ) :
    /**
    * list articles section details.
    *
    * @since Blog Page 1.0.0
    * @param array $input list articles section details.
    */
    function blog_page_get_list_articles_section_details( $input ) {
        $options = blog_page_get_theme_options();
        
        $content = array();
        $cat_id = ! empty( $options['list_articles_content_category'] ) ? $options['list_articles_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
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
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// list articles section content details.
add_filter( 'blog_page_filter_list_articles_section_details', 'blog_page_get_list_articles_section_details' );


if ( ! function_exists( 'blog_page_render_list_articles_section' ) ) :
  /**
   * Start list articles section
   *
   * @return string list articles content
   * @since Blog Page 1.0.0
   *
   */
   function blog_page_render_list_articles_section( $content_details = array() ) {
        $options = blog_page_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="photography" class="page-section">
            <div class="wrapper">
                <div class="header-wrapper clear">
                    <?php if ( ! empty( $options['list_articles_title'] ) || ! empty( $options['list_articles_subtitle'] ) ) : ?>
                        <div class="section-header">
                            <?php if ( ! empty( $options['list_articles_title'] ) ) : ?>
                                <h2 class="section-title"><?php echo esc_html( $options['list_articles_title'] ); ?></h2>
                            <?php endif;  ?>
                            <div class="seperator"></div>
                        </div><!-- .section-header -->
                    <?php endif;  ?>
                </div><!-- .header-wrapper -->

                <div class="post-archive">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry <?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>')">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                </div>
                            <?php endif; ?>

                            <div class="entry-container">
                                    <span class="cat-links">
                                        <?php the_category( ', ', '', $content['id'] ); ?>
                                    </span><!-- .cat-links -->

                             
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header><!-- .entry-meta  -->


                                    <div class="entry-meta">
                                        <?php  
                                            echo wp_kses_post( $content['author'] );
                                            blog_page_posted_on( $content['id'] );
                                        ?>
                                    </div><!-- .entry-meta -->


                                <?php if ( ! empty( $options['list_articles_readmore'] ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="more-link">
                                        <?php  
                                            echo esc_html( $options['list_articles_readmore'] ) . ' ' ;
                                            echo blog_page_get_svg( array( 'icon' => 'right' ) );
                                        ?>
                                    </a><!-- .more-link  -->
                                <?php endif; ?>
                            </div><!-- .entry-container  -->
                        </article><!-- .hentry  -->
                    <?php endforeach; ?>
                </div><!-- .post-archive  -->
            </div><!-- .wrapper -->
        </div><!-- .photography  -->
    <?php }
endif;