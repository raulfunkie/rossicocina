<?php
/* Template Name: Blog */
get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <section class="page-meta">
        <h1>Articulos</h1>
      </section>
      <section class="post-list">
        <?php $custom_query_args = array( 'posts_per_page' => 10, 'ignore_sticky_posts' => 1 );
        // Get current page and append to custom query parameters array
        $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        // Instantiate custom query
        $custom_query = new WP_Query( $custom_query_args );
        // Pagination fix
        $temp_query = $wp_query;
        $wp_query   = NULL;
        $wp_query   = $custom_query;
  
        if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <article>
              <figure>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                </a>
              </figure>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
                <div>
                  <?php the_title( '<h2>', '</h2>' ); ?>
                  <time datetime="<?php echo get_the_date('c'); ?>" title="Fecha de Publicación: <?php echo get_the_date('M j, Y'); ?>"><?php echo get_the_date('m/d/y'); ?></time>
                  <p><?php the_excerpt(); ?></p>
                </div>
              </a>
            </article>
            <?php endwhile; ?>
            </section>
            <div class="pagination">
              <?php next_posts_link( 'Posts Anteriores', $custom_query->max_num_pages ); previous_posts_link( 'Posts Recientes' ); ?>
            </div>
            <?php else: ?>
              <?php  _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?>
            <?php endif; ?>
            <?php $wp_query = NULL; $wp_query = $temp_query; ?>
    </main>
<?php get_footer(); ?>