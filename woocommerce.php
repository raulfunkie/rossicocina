<?php get_header(); ?>
<main>
  <?php get_template_part('includes/logo', 'header'); ?>
  <article>
    <?php woocommerce_content(); ?>
  </article>
</main>
<?php get_footer(); ?>