<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
      <div class="search input-container">
        <input type="text" value="" name="s" id="s" placeholder="Buscar receta.." />
      </div>
      <nav>
        <?php wp_nav_menu( array('menu' => '', 'theme_location' => 'head-menu', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
      </nav>
    </header>