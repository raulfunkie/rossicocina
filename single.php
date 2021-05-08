<?php get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
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
      <?php get_template_part('includes/related', 'posts'); ?>
    </main>
<?php get_footer(); ?>