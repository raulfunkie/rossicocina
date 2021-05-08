<?php get_header(); ?>
<main>
  <?php get_template_part('includes/logo', 'header'); ?>
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
  <article>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $sdp = get_field('recipe'); ob_start(); ?>
    <section class="post-meta">
     <?php if ( has_post_thumbnail() ) { ?>
     <figure>
       <a href="<?php echo get_the_post_thumbnail_url(); ?>" target="_blank" title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>">
          <?php the_post_thumbnail('single-post-image'); ?>
       </a>
     </figure>
     <?php } ?>
      <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
       <div class="post-meta-details">
        <ul>
          <li>
            <h5>Publicado</h5>
            <time datetime="<?php echo get_the_date('c'); ?>" title="Originally published <?php echo get_the_date('M j, Y'); ?>"><?php echo get_the_date('m/d/y - H:i'); ?></time>
          </li>
          <li>
            <h5>Actualizado</h5>
            <time datetime="<?php echo get_post_modified_time('c'); ?>" title="Originally published <?php echo get_post_modified_time('M j, Y'); ?>"><?php echo get_post_modified_time('m/d/y - H:i'); ?></time>
          </li>
          <li>
            <h5>Tags</h5>
            <?php the_tags( '<div class="tag-list">', ', ', '</div>' ); ?>
          </li>
        </ul>
      </div>
    </section>
    <div class="content">
      <?php the_content(); ?>
    </div>
    <?php endwhile; else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
  </article>
</main>
<?php get_footer(); ?>