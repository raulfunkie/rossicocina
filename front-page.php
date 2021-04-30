<?php /*
Template name: Front Page */
get_header(); ?>
    <main>
      <section class="homepage-hero">
        <div>
          <h1>
            <object type="image/svg+xml" data="assets/rossi-logo.svg" class="logo">
              no-fallback
            </object>
          </h1>
          <p><?php echo get_post_field('post_content', $post->ID); ?></p>
        </div>
        <div>
          <figure>
            <img src="assets/rossana.jpg" alt="Logo RossiCocina" />
          </figure>
        </div>
      </section>
      <section class="sticky">
        <?php $sticky = get_option( 'sticky_posts' );
          $args = array(
            'posts_per_page'      => 2,
            'post__in'            => $sticky,
            'ignore_sticky_posts' => 1
            );
        
          if ( !empty($sticky) ):
            // has sticky posts
            query_posts($args);
        
          $stickyPosts = new WP_query();
          $stickyPosts->query($args);
            if ( $stickyPosts->have_posts() ): ?>
        <ul>
          <?php while ( $stickyPosts->have_posts() ) : $stickyPosts->the_post();?>
          <li>
            <?php $tags = get_the_tags(); foreach ( $tags as $tag ) { ?>
            <a class="category"  href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag"><?php echo $tag->name; ?></a>
            <?php } ?>
            <figure>
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
                <img src="assets/image1.png" alt="post title image"/>
              </a>
            </figure>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __('Sigue leyendo: '), 'after' => ' &rarr;' ) ); ?>">
              <div>
                <?php the_title( '<h2>', '</h2>' ); ?>
                <p><?php the_excerpt();?></p>
              </div>
            </a>
          </li>
          <?php endwhile; endif;
          wp_reset_query(); endif; ?>
        </ul>
      </section>
      <section class="home-posts">
        <section class="posts">
          <h2>Lo último</h2>
          <?php $custom_query_args = array( 'posts_per_page' => 6, 'ignore_sticky_posts' => 1 );
          $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
          $custom_query = new WP_Query( $custom_query_args );
          $temp_query = $wp_query;
          $wp_query   = NULL;
          $wp_query   = $custom_query; ?>
          <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
          <article  <?php post_class(); ?>>
            <figure>
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('post-featured-img'); } else { ?>
              <img src="<?php bloginfo('template_directory'); ?>/assets/default-post-img.png" alt="<?php the_title(); ?>" />
              <?php } ?>
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
          <?php if ($the_query->max_num_pages > 1) { ?>
            <div class="user-actions">
              <a class="btn btn-yellow">Posts anteriores</a>
            </div>
            <?php next_posts_link( 'Posts Anteriores', $custom_query->max_num_pages );
             previous_posts_link( 'Posts Recientes' ); ?>
          <?php } ?>
        <?php else:  ?>
          <!--<?php _e( 'Sorry, no posts matched your criteria.' ); ?>-->
        <?php endif; ?>
        <?php $wp_query = NULL; $wp_query = $temp_query; ?>
        </section>
        <?php get_sidebar(); ?>
      </section>
    </main>
<?php get_footer(); ?>