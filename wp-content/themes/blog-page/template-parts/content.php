<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

$options = blog_page_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>

    <div class="entry-container">
        <span class="cat-links">
            <?php echo blog_page_article_footer_meta(); ?>
        </span>

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-meta">
            <?php  
                echo blog_page_author();
                blog_page_posted_on();
            ?>
        </div>
    </div><!-- .entry-container -->

</article><!-- #post-## -->
