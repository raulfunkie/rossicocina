<?php get_header(); ?>
    <main>
      <?php get_template_part('includes/logo', 'header'); ?>
      <article>
        <section class="page-meta">
          <h1>😥</h1>
          <h1>Oh oh!</h1>
          <h3>Ha ocurrido un error</h3>
        </section>
        <div class="content">
          <p>El URL al que intentaste acceder no existe. Te invitamos a regresar a la <a href="<?php echo get_home_url(); ?>">pagina principal</a> para revisar los ultimos articulos ó utilizar la función de busqueda en la parte superior izquierda del sitio web.</p>
          <span class="big-emoji">
            🧁
          </span>
          <p>Te regalamos este cupcake para que te sientas mejor.</p>
        </div>
      </article>
    </main>
<?php get_footer(); ?>