<hr>
<div class="related">
  <ul>
    <?php $popularpost = new WP_Query( array( 'posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'RAND'  ) );
    while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
    <?php if ( in_category ('receta') ) { ?>
    <li <?php post_class(); ?> itemscope itemtype="https://schema.org/Recipe">
    <? } else { ?>
    <li <?php post_class(); ?>>
    <?php } ?>
      <a href="<?php the_permalink(); ?>" rel="bookmark" <?php the_title_attribute(); ?>>
        <figure itemprop="image">
          <?php the_post_thumbnail('related-image'); ?>
        </figure>
        <div class="related-meta">
          <time itemprop="datePublished" datetime="<?php echo get_the_date('c'); ?>" title="Publicado <?php echo get_the_date('M j, Y'); ?>"><?php echo get_the_date('m/d/y'); ?></time>
          <?php the_title( '<h3 itemprop="name">', '</h3>' ); ?>
        </div>
      </a>
    </li>
    <?php endwhile; wp_reset_query(); ?>
  </ul>
</div>