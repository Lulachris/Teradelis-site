  <header class="nl-main-title">
    <h1 class="page-title"><?php _e( 'Nothing Found', 'winter-blues' ); ?></h1>
  </header><!-- .nl-main-title -->

  <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
    <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'winter-blues' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
</p>
  <?php else : ?>

    <div class="searchresult">
      <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'winter-blues' ); ?></p>
    </div><!-- .searchresult -->

    <div class="notfound-search">
      <?php get_search_form(); ?>
    </div>

  <?php endif; ?>