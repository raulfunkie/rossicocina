<?php

function load_css() {
  wp_enqueue_style( 'reset', get_template_directory_uri() . '/reset.css' );
  wp_enqueue_style( 'gfonts', '//fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,700;1,400&family=JetBrains+Mono&family=Playfair+Display:ital,wght@0,600;0,700;1,900&display=swap', false ); 
  wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css', array(), filemtime(get_stylesheet_directory() .'/style.css'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'load_css' );

// remove shit from header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wrong_login() {
  return 'Wrong username or password.';
}
add_filter('login_errors', 'wrong_login');

function filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

remove_filter('the_content', 'wpautop');

function disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );
add_filter( 'emoji_svg_url', '__return_false' );

add_action( 'after_setup_theme', 'theme_functions' );
function theme_functions() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'responsive-embeds' );
}

function remove_page_class($wp_list_pages) {
  $pattern = '/\<li class="page_item[^>]*>/';
  $replace_with = '<li>';
  return preg_replace($pattern, $replace_with, $wp_list_pages);
}
add_filter('wp_list_pages', 'remove_page_class');


function html5_insert_image($html, $id, $caption, $title, $align, $url, $size) {
    $src = wp_get_attachment_image_src( $id, $size, false );
    $html5 = '<figure>';
    $html5 .= '<img src="'.$src[0].'"';
    $html5 .= ' alt="'.$title.'" />';
    $html5 .= '<figcaption>'.$caption.'</figcaption>';
    $html5 .= '</figure>';
    return $html5;
  }
add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

function better_wpautop($pee){
  return wpautop($pee,false);
}
add_filter( 'the_content', 'better_wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
  register_nav_menus (
    array (
      'head-menu' => 'Header Navigation'
    )
  );
}

function shapeSpace_remove_toolbar_nodes($wp_admin_bar) {
  $wp_admin_bar->remove_node('wp-logo');
  $wp_admin_bar->remove_node('comments');
  $wp_admin_bar->remove_node('updates');
  $wp_admin_bar->remove_node('customize');
}
add_action('admin_bar_menu', 'shapeSpace_remove_toolbar_nodes', 999);

function cf_google_analytics_tracking() { ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-SWGSHY3BQG"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'X');
  </script>
<?php }
add_action( 'wp_head', 'cf_google_analytics_tracking', 10 );

function favico() { ?>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/fav/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/fav/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/fav/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/fav/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/fav/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/fav/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/fav/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/fav/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/fav/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/fav/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/fav/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/fav/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/fav/favicon-16x16.png">
  <link rel="manifest" href="assets/fav/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/fav/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
<?php }
add_action( 'wp_head', 'favico', 10 );

/* Custom page for RossiCocina */
function wp_rossicocina() {
  add_menu_page(
    __( 'RossiCocina', 'rossicocina-textdomain' ),
    __( 'RossiCocina menu', 'rossicocina-textdomain' ),
    'manage_options',
    'rossicocina-page',
    'wp_page_rossicocina',
    'data:image/svg;base64,PHN2ZyBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyOTcgMjk3IiB2aWV3Qm94PSIwIDAgMjk3IDI5NyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtNzkuNzkyIDE5Mi45MjRjOC4zMjYgOS44ODMgMjAuODY0IDE2LjE4NSAzNC44NjQgMTYuMTg1IDEzLjcxNiAwIDI2LjAwMS02LjI2OSAzNC4xNzgtMTYuMTA5IDguMjc0IDkuODQxIDIwLjcxIDE2LjEwOSAzNC41OTIgMTYuMTA5IDEzLjcxNiAwIDI2LjAwMS02LjI2OSAzNC4xNzgtMTYuMTA5IDguMjc0IDkuODQxIDIwLjcxIDE2LjEwOSAzNC41OTIgMTYuMTA5IDI0LjcwNSAwIDQ0LjgwNS0yMC4wOTkgNDQuODA1LTQ0LjgwNCAwLTU1LjA5Ni00OC4yNjUtMTAxLjQzNS0xMTMuMTIyLTExNC4wMTQtMi43NzUgMi43MzUtNS45NTggNS40NTEtOS41NzQgOC4xNDEtOS41NjggNy4xMTUtMTkuMDcgMTEuODQ2LTE5LjQ3MSAxMi4wNDMtMi4wMzkgMS4wMS00LjI1NCAxLjUxNS02LjQ3MSAxLjUxNS0yLjI1NSAwLTQuNTEtLjUyNC02LjU3Ny0xLjU2Ny0uMzk4LS4yMDEtOS44NjItNS4wMS0xOS4zNzMtMTIuMjAyLTMuNDczLTIuNjI4LTYuNTMzLTUuMjc1LTkuMjIxLTcuOTM4LTY0Ljg5MSAxMi41NTctMTEzLjE5MiA1OC45MDYtMTEzLjE5MiAxMTQuMDIyIDAgMjQuNzA1IDIwLjM0MiA0NC44MDQgNDUuMzQ2IDQ0LjgwNCAxMy44MzMtLjAwMSAyNi4yMjEtNi4zMDIgMzQuNDQ2LTE2LjE4NXoiLz48cGF0aCBkPSJtMTgyLjg4OCAyMy4xNTdjLjAzNy05LjQ5Ni03LjYzLTE3LjIyNS0xNy4xMjUtMTcuMjY1LS4wMjQgMC0uMDQ3IDAtLjA3MSAwLTkuNDYzIDAtMTcuMTUzIDcuNjUyLTE3LjE5MiAxNy4xMjEuMDM5LTkuNDk0LTcuNjMtMTcuMjIzLTE3LjEyMy0xNy4yNjMtLjAyNCAwLS4wNDkgMC0uMDczIDAtOS40NjEuMDAxLTE3LjE1MiA3LjY1NC0xNy4xOSAxNy4xMjMtLjA2NyAxNy4xOTIgMzQuMjUgMzQuNTI3IDM0LjI1IDM0LjUyN3MzNC40NTQtMTcuMDUxIDM0LjUyNC0zNC4yNDN6Ii8+PHBhdGggZD0ibTI1Mi4xOTUgMjIzLjY5NmMtMTIuNTI3IDAtMjQuNTQ4LTMuODk2LTM0LjU0LTEwLjk3OC05LjkwMiA3LjA4Mi0yMS44MTMgMTAuOTc4LTM0LjIzIDEwLjk3OC0xMi41MjcgMC0yNC41NDgtMy44OTYtMzQuNTQtMTAuOTc4LTkuOTAyIDcuMDgyLTIxLjgxMyAxMC45NzgtMzQuMjI5IDEwLjk3OC0xMi42MzYgMC0yNC43NTEtMy45MjQtMzQuODEyLTExLjA1OC05Ljk2OCA3LjEzNC0yMS45NzMgMTEuMDU4LTM0LjQ5OSAxMS4wNTgtMy44MTIgMC03LjUzNy0uMzY5LTExLjE1My0xLjA0N2w0Ljc2MSAzMC45MjljMy4xOTYgMjAuNzcyIDIyLjg5NiAzNy42NzEgNDMuOTExIDM3LjY3MWgxMzEuMjcxYzIxLjAxNiAwIDQwLjcxNS0xNi44OTggNDMuOTEtMzcuNjdsNC43NDgtMzAuODQ5Yy0zLjQ0MS42MjQtNi45NzkuOTY2LTEwLjU5OC45NjZ6Ii8+PC9zdmc+',
    1
  );
}

add_action( 'admin_menu', 'my_admin_menu' );

function wp_page_rossicocina() {
  ?>
    <h1>
      <?php esc_html_e( 'RossiCocina Custom Settings', 'rossicocina-textdomain' ); ?>
    </h1>
  <?php
}

?>