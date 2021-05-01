<?php get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <section class="page-meta">
        <h4>Mostrando Articulos con el tag</h4>
        <h1><?php printf( __( '%s', 'pietergoosen' ), single_tag_title( '', false ) ); ?></h1>
      </section>
      <section class="post-list">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
          <?php else: ?>
            <?php  _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?>
          <?php endif; ?>
        </section>
        <div class="pagination">
          <?php next_posts_link( 'Posts Anteriores', $custom_query->max_num_pages ); previous_posts_link( 'Posts Recientes' ); ?>
        </div>
      </main>
<?php get_footer(); ?>