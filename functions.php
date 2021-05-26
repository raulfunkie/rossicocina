<?php
function load_css() {
  wp_enqueue_style( 'reset', get_template_directory_uri() . '/reset.css', false );
  wp_enqueue_style( 'gfonts', '//fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,500;0,700;1,400&family=JetBrains+Mono&family=Playfair+Display:ital,wght@0,600;0,700;1,700&display=swap', array(), null ); 
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

remove_filter ('the_content', 'wpautop');
remove_filter ('the_excerpt', 'wpautop');

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

function theme_functions() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'menus' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'widgets' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'theme_functions' );

function rc_image_sizes() {
  add_image_size( 'single-post-image', 1080, 540, true );
  add_image_size( 'sticky-post-image', 480, 240, true );
  add_image_size( 'home-post-image', 200, 200, true );
  add_image_size( 'related-image', 100, 100, true );
  add_image_size( 'recipe-image', 480, 480, true );
}
add_action( 'after_setup_theme', 'rc_image_sizes' );

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

add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
  register_nav_menus (
    array (
      'head-menu' => __( 'Header Navigation', 'text_domain' ),
      'rossicocina'  => __( 'Footer - RossiCocina', 'text_domain' ),
      'tips'  => __( 'Footer - Recetas & Tips', 'text_domain' ),
      'product-showcase'  => __( 'Footer - Producto', 'text_domain' ),
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YC2R3W3261"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'G-YC2R3W3261');
  </script>
<?php }
add_action( 'wp_head', 'cf_google_analytics_tracking', 10 );

function ci_mailchimp() { ?>
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/46d59c8feb968ef2d02eca32e/f6afbb8ff825bc256eb0e5346.js");</script>
<?php }
add_action( 'wp_head', 'ci_mailchimp', 11 );

function prefetch_links() { ?>
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
<?php }
add_action( 'wp_head', 'prefetch_links', 10 );

function favico() { ?>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/fav/ms-icon-144x144.png">
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

function prev_class() { return 'class="btn btn-magenta"'; }
function next_class() { return 'class="btn btn-yellow"'; }

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

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function my_excerpt_length($length){
  return 40;
}
add_filter('excerpt_length', 'my_excerpt_length');

/* oh shit, recipe category, am I rite? */
function get_custom_cat_template($single_template) {
   global $post;
   if ( in_category( 'receta' )) {
      $single_template = dirname( __FILE__ ) . '/single-recipe.php';
   }
   return $single_template;
} 
add_filter( "single_template", "get_custom_cat_template" ) ;

add_filter('body_class','add_category_to_single');
function add_category_to_single($classes) {
  if ( is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      $classes[] = $category->category_nicename;
    }
  }
  return $classes;
}

add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
  if ( is_single() && in_category('receta') ) {
    global $post;
    $classes[] = get_field('recipe_type', $post->ID, false);
  }
  return $classes;
}

add_filter('wpcf7_form_elements', function($content) {
  $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
  $content = str_replace('<br />', '', $content);
  
  return $content;
});

// LearnPress Actions
function theme_prefix_lp_course_tab_remove( $tabs ) {
    unset( $tabs['instructor'] );
    return $tabs;
}
add_filter( 'learn-press/course-tabs', 'theme_prefix_lp_course_tab_remove' );

// WooCommerce Actions
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

function bbloomer_required_woo_checkout_fields( $fields ) {
  $fields['billing']['billing_company']['required'] = false;
  $fields['billing']['billing_address_1']['required'] = false;
  $fields['billing']['billing_address_2']['required'] = false;
  $fields['billing']['billing_city']['required'] = false;
  $fields['billing']['billing_postcode']['required'] = false;
  $fields['billing']['billing_state']['required'] = false;
  $fields['billing']['billing_phone']['required'] = false;
  $fields['billing']['billing_phone']['required'] = false;
  
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_phone']);
  unset($fields['order']['order_comments']);
  
  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'bbloomer_required_woo_checkout_fields' );

function custom_checkout_fields( $fields ) {
  $fields['billing']['billing_first_name']['placeholder'] = 'Nombre';
  $fields['billing']['billing_email']['placeholder'] = 'Email';
  $fields['billing']['billing_last_name']['placeholder'] = 'Apellido';
  $fields['billing']['billing_country']['placeholder'] = 'Pais';
  $fields['billing']['billing_country']['placeholder'] = 'Pais';
  $fields['account']['account_username']['placeholder'] = 'Usuario';
  $fields['account']['account_password']['placeholder'] = 'Contraseña';
  
  $fields['billing']['billing_country']['priority'] = '1';
  $fields['billing']['billing_email']['priority'] = '2';
  
  return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_fields' );

  function bbloomer_cart_on_checkout_page_only() {
    if ( is_wc_endpoint_url( 'order-received' ) ) return;
    echo do_shortcode('[woocommerce_cart]');
}
add_action( 'woocommerce_before_checkout_form', 'bbloomer_cart_on_checkout_page_only', 5 );

function bbloomer_redirect_empty_cart_checkout_to_home() {
   if ( is_cart() && is_checkout() && 0 == WC()->cart->get_cart_contents_count() && ! is_wc_endpoint_url( 'order-pay' ) && ! is_wc_endpoint_url( 'order-received' ) ) {
      wp_safe_redirect( home_url() );
      exit;
   }
}
add_action( 'template_redirect', 'bbloomer_redirect_empty_cart_checkout_to_home' );

function bbloomer_redirect_checkout_add_cart() {
   return wc_get_checkout_url();
}
add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' );
 
function bbloomer_checkout_fields_in_label_error( $field, $key, $args, $value ) {
   if ( strpos( $field, '</label>' ) !== false && $args['required'] ) {
      $error = '<span class="error" style="display:none">';
      $error .= sprintf( __( '%s is a required field.', 'woocommerce' ), $args['label'] );
      $error .= '</span>';
      $field = substr_replace( $field, $error, strpos( $field, '</span>' ), 0);
   }
   return $field;
}

add_filter( 'woocommerce_form_field', 'bbloomer_checkout_fields_in_label_error', 10, 4 );

if ( ! current_user_can( 'manage_options' ) ) {
  add_filter('show_admin_bar', '__return_false', 1000);
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    // unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}