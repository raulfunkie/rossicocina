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
        $the_query = new WP_Query(array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1, 'orderby' => 'modified' )); ?>
        <ul>
          <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <li>
            <?php $tags = get_the_tags(); foreach ( $tags as $tag ) { ?>
            <a class="category"  href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag"><?php echo $tag->name; ?></a>
            <?php } ?>
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
          <?php $the_query = new WP_Query( array( 'posts_per_page' => 6, 'post__not_in' => get_option( 'sticky_posts' ) ) );
          if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <article <?php post_class(); ?>>
            <figure>
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            </figure>
            <div>
              <time datetime="<?php echo get_the_date('c'); ?>" title="Fecha de Publicación: <?php echo get_the_date('M j, Y'); ?>"><?php echo get_the_date('m/d/y'); ?></time>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
                <?php the_title( '<h2>', '</h2>' ); ?>
              </a>
              <p><?php the_excerpt(); ?></p>
            </div>
          </article>
          <?php endwhile; ?>
          <a class="btn" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">más Articulos</a>
        <?php else:  ?>
          <!--<?php _e( 'Sorry, no posts matched your criteria.' ); ?>-->
        <?php endif; ?>
        <?php $wp_query = NULL; $wp_query = $temp_query; ?>
        </section>
        <?php get_sidebar(); ?>
      </section>
    </main>
<?php get_footer(); ?>