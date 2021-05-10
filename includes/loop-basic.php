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
               <?php if (  get_field('recipe_description') ) { ?>
                <span itemprop="abstract">
                  <?php echo wp_trim_words( get_field('recipe_description'), 40, '...' ); ?>
                </span>
                <?php } else { ?>
                <p>
                  <?php the_excerpt(); ?>
                </p>
                <?php } ?>
            </div>
          </a>
        </article>
        <?php endwhile; else: ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      </section>
      <div class="pagination">
        <?php next_posts_link( 'Posts Anteriores' );
         previous_posts_link( 'Posts Recientes' ); ?>
      </div>