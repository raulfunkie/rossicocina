<?php get_header(); ?>
<main>
  <?php get_template_part('includes/logo', 'header'); ?>
  <article class="recipe-post" itemscope itemtype="https://schema.org/Recipe">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('includes/loop', 'recipe'); ?>
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
