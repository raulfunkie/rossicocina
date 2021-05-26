<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="https://schema.org/Blog">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
      <?php get_search_form(); ?>
      <nav role="navigation">
        <?php wp_nav_menu( array('container_aria_label' => 'navigation', 'menu' => '', 'theme_location' => 'head-menu', 'fallback_cb' => false, 'container' => false, 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
      </nav>
    </header>