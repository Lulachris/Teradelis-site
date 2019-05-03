<?php get_header(); ?>

<div class="main">

  <header class="nl-main-title">
    <?php if ( have_posts() ) : ?>
      <h1 class="page-title"><?php printf( __( 'Search Results for: <b>%s</b>', 'winter-blues' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php else : ?>
      <h1 class="page-title"><?php _e( 'Nothing Found', 'winter-blues' ); ?></h1>
    <?php endif; ?>
  </header><!-- .nl-main-title -->

  <?php if ( have_posts() ) :

    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', get_post_format() );
    endwhile;
  
    get_template_part( 'template-parts/pagination' ); 

  else : ?>

  <div class="searchresult">
    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'winter-blues' ); ?></p>
  </div><!-- .searchresult -->

  <div class="notfound-search">
    <?php get_search_form(); ?>
  </div><!-- .notfound-search -->

  <?php endif; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer();
