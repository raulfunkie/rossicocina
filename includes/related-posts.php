<div class="related">
  <ul>
    <?php $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'RAND'  ) );
    while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>" rel="bookmark" <?php the_title_attribute(); ?>>
        <figure>
          <?php the_post_thumbnail('related-image'); ?>
        </figure>
        <div>
          <?php the_title( '<h3>', '</h3>' ); ?>
          <time datetime="<?php echo get_the_date('c'); ?>" title="Originally published <?php echo get_the_date('M j, Y'); ?>"><?php echo get_the_date('m/d/y'); ?></time>
        </div>
      </a>
    </li>
    <?php endwhile; wp_reset_query(); ?>
  </ul>
</div>