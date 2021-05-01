<?php

function load_css() {
  wp_enqueue_style( 'reset', get_template_directory_uri() . '/reset.css' );
  wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,700;1,400&family=JetBrains+Mono&family=Playfair+Display:ital,wght@0,600;0,700;1,700&display=swap', false ); 
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=asdfasdf"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'X');
  </script>
<?php }
add_action( 'wp_head', 'cf_google_analytics_tracking', 10 );

function prefetch_links() { ?>
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
<?php }
add_action( 'wp_head', 'prefetch_links', 10 );

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


// register sidebars
function wpb_widgets_init() {

  register_sidebar( array(
      'name' => __( 'sidebar', 'rcsb' ),
      'id' => 'sidebar',
      'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
      'before_widget' => '<section id="%1$s" class="panel %2$s">',
      'after_widget' => '</section>'
  ) );
}
add_action( 'widgets_init', 'wpb_widgets_init' );

add_filter('next_posts_link_attributes', 'next_class');
add_filter('previous_posts_link_attributes', 'prev_class');

function prev_class() { return 'class="btn btn-yellow"'; }
function next_class() { return 'class="btn btn-magenta"'; }

add_action( 'after_setup_theme', 'rc_image_sizes' );
function rc_image_sizes() {
  add_image_size( 'single-post-image', 1080, 540 );
  add_image_size( 'sticky-post-image', 480, 240 );
  add_image_size( 'related-image', 100, 100, array( 'center', 'center' ) ); 
}

function wpb_track_post_views ($post_id) {
  if ( !is_single() ) return;
  if ( empty ( $post_id) ) {
      global $post;
      $post_id = $post->ID;    
  }
  wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_set_post_views($postID) {
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function clean_post_content($content) {
    // For individual posts and the index page
    if ( is_single() || is_home() ) {
        // Remove inline styling
        $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
        // Remove font tag
        $content = preg_replace('/<font[^>]+>/', '', $content);
        // Remove empty tags
        $post_cleaners = array('<p></p>' => '', '<p> </p>' => '', '<div></div>' => '', '<div>&nbsp;</div>' => '', '<div> </div>' => '', '<p>&nbsp;</p>' => '', '<span></span>' => '', '<span> </span>' => '', '<span>&nbsp;</span>' => '', '<span>' => '', '</span>' => '', '<font>' => '', '</font>' => '');
        $content = strtr($content, $post_cleaners);
    }
    return $content;
}
add_filter( 'the_content', 'clean_post_content' );

?>
