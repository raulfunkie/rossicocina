<?php get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <div class="related">
        <ul>
          <?php
          $tags = wp_get_post_tags($post->ID);
          if ($tags) {
          $first_tag = $tags[0]->term_id;
          $args=array(
          'tag__in' => array($first_tag),
          'post__not_in' => array($post->ID),
          'posts_per_page'=> 4,
          'caller_get_posts'=> 1
          );
          $my_query = new WP_Query($args);
          if( $my_query->have_posts() ) {
          while ($my_query->have_posts()) : $my_query->the_post(); ?>
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
          <?php endwhile; } wp_reset_query(); } ?>
        </ul>
      </div>
      <article>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                <div class="tag-list">
                <?php $tags = get_the_tags(); foreach ( $tags as $tag ) { ?>
                 <a href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag"><?php echo $tag->name; ?></a>
                <?php } ?>
                </div>
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