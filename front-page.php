<?php /*
Template name: Front Page */
get_header(); ?>
    <main>
      <section class="homepage-hero">
        <div>
          <h1>
            <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/assets/rossi-logo.svg" class="logo">
              RossiCocina Logo
            </object>
          </h1>
        <?php if( get_option('rc_intro_text') ): ?>
          <p><?php echo get_option('rc_intro_text'); ?></p>
        <?php endif; ?>
        </div>
        <div>
          <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/rossana.jpg" alt="Foto Rossana Hanna" />
          </figure>
        </div>
      </section>
      <section class="sticky">
        <?php $sticky = get_option( 'sticky_posts' );
        rsort( $sticky );
        $sticky = array_slice( $sticky, 0, 2 );
        $the_query = new WP_Query(array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'posts_per_page' => 5 )); ?>
        <ul>
          <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <li>
            <?php $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<a class="category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }?>
            <figure>
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('sticky-post-image'); } ?>
              </a>
            </figure>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
              <div>
                <?php the_title( '<h2>', '</h2>' ); ?>
                <p><?php the_excerpt();?></p>
              </div>
            </a>
          </li>
          <?php endwhile; else : ?>
           <li><?php _e( 'Sorry, no posts matched your criteria.' ); ?></li>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </ul>
      </section>
      <section class="home-posts">
        <section class="posts">
          <h2>Lo último</h2>
          <div class="home-post-list">
            <?php $the_query = new WP_Query( array( 'posts_per_page' => 8, 'post__not_in' => get_option( 'sticky_posts' ) ) );
            if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php if ( in_category ('receta') ) { ?>
            <article <?php post_class(); ?> itemscope itemtype="https://schema.org/Recipe">
            <? } else { ?>
            <article <?php post_class(); ?>>
            <?php } ?>
              <figure itemprop="image">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('home-post-image'); } ?>
              </figure>
              <div>
                <span class="time-cat">
                  <time itemprop="" datetime="<?php echo get_the_date('c'); ?>" title="Fecha de Publicación: <?php echo get_the_date('M j, Y'); ?>"><?php echo get_the_date('m/d/y'); ?></time>
                  <?php $categories = get_the_category();
                  if ( ! empty( $categories ) ) {
                      echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                  } ?>
                </span>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>" >
                  <?php the_title( '<h2 itemprop="name">', '</h2>' ); ?>
                </a>
                <span class="post-excerpt" itemprop="abstract">
                <?php if (  get_field('recipe_description') ) { ?>  
                  <?php echo wp_trim_words( get_field('recipe_description'), 40, '...' ); ?>
                <?php } else { ?>
                  <?php the_excerpt(); ?>
                <?php } ?>
                </span>
              </div>
            </article>
            <?php endwhile; ?>
          </div>
          <a class="btn btn-magenta" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Más Articulos</a>
        <?php else:  ?>
          <!--<?php _e( 'Sorry, no posts matched your criteria.' ); ?>-->
        <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
      </section>
    </main>
<?php get_footer(); ?>