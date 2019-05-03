<?php get_header(); ?>

<div class="main">

  <header class="nl-main-title">
    <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found', 'winter-blues' ); ?></h1>
  </header><!-- .nl-main-title -->

  <div class="searchresult">
    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'winter-blues' ); ?></p>
  </div><!-- .searchresult -->
  
  <div class="notfound-search">
    <?php get_search_form(); ?>
  </div>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>