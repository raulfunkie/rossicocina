<?php get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <section class="page-meta">
        <h4>Resultados de la busqueda</h4>
        <h1><?php the_search_query(); ?></h1>
      </section>
      <?php get_template_part('includes/loop', 'basic'); ?>
    </main>
<?php get_footer(); ?>
