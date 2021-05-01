<?php get_header(); ?>
  <main>
    <?php get_template_part('includes/logo', 'header'); ?>
    <article>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <section class="page-meta">
        <h1>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
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