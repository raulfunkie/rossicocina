<?php get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <section class="page-meta">
        <h4>Mostrando articulos en la Categoria</h4>
        <h1><?php single_cat_title(); ?></h1>
      </section>
      <?php get_template_part('includes/loop', 'basic'); ?>
    </main>
<?php get_footer(); ?>
