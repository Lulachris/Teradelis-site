<?php if ( is_singular() && has_post_thumbnail() ) : ?>

  <style>#content { top: 480px; }</style>
  <div class="nl-header">
  <div class="lazy nl-header-img thumbnail" height="<?php echo get_custom_header()->height; ?>" style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>)"></div>
</div>
<?php elseif ( has_header_image() ) : ?>

  <style>#content { top: 480px; }</style>
  <div class="nl-header">
  <div class="lazy nl-header-img" height="<?php echo get_custom_header()->height; ?>" style="background-image: url(<?php header_image(); ?>)"></div>
</div>
<?php endif; ?>