<?php
/* Template Name: Blog */
get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <section class="page-meta">
        <h1>Articulos</h1>
      </section>
      <?php get_template_part('includes/loop', 'basic'); ?>
    </main>
<?php get_footer(); ?>