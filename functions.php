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

function facebook_pixel() { ?>
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '539119487105197');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=539119487105197&ev=PageView&noscript=1"
  /></noscript>
<?php }
add_action( 'wp_head', 'facebook_pixel', 10 );

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
  $fields['account']['account_password']['required'] = false;
  $fields['account']['account_password-2']['required'] = false;
  $fields['account']['account_username']['required'] = false;
  
  
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_phone']);
  unset($fields['order']['order_comments']);
  unset($fields['account']['account_password']);
  unset($fields['account']['account_password-2']);
  unset($fields['account']['account_username']);
  
  return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'bbloomer_required_woo_checkout_fields' );

function custom_checkout_fields( $fields ) {
  $fields['billing']['billing_first_name']['placeholder'] = 'Nombre';
  $fields['billing']['billing_email']['placeholder'] = 'Email';
  $fields['billing']['billing_last_name']['placeholder'] = 'Apellido';
  $fields['billing']['billing_country']['placeholder'] = 'Pais';
  // $fields['account']['account_password']['placeholder'] = 'Contraseña';
  // $fields['account']['account_password']['type'] = 'password';
   
  $fields['billing']['billing_country']['priority'] = '1';
  $fields['billing']['billing_email']['priority'] = '2';
  
  return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_checkout_fields' );

add_filter( 'woocommerce_new_customer_data', function( $data ) {
  $data['user_login'] = $data['user_email'];

  return $data;
} );
 
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

add_filter( 'woocommerce_product_description_heading', '__return_null' );

function woocommerce_output_product_data_tabs() {
   $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
   if ( empty( $product_tabs ) ) return;
   echo '<section class="woocommerce-tabs wc-tabs-wrapper">';
   foreach ( $product_tabs as $key => $product_tab ) {
      ?>
         <h2><?php echo $product_tab['title']; ?></h2>      
         <div id="tab-<?php echo esc_attr( $key ); ?>">
            <?php
            if ( isset( $product_tab['callback'] ) ) {
               call_user_func( $product_tab['callback'], $key, $product_tab );
            }
            ?>
         </div>
      <?php         
   }
   echo '</section>';
}
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#5B2491" d="M22.43 32c3.22 0 5.67-.36 7.45-2.13 1.77-1.79 2.12-4.22 2.12-7.44V9.59c0-3.24-.35-5.67-2.12-7.44C28.1.38 25.65 0 22.43 0H9.55C6.38 0 3.92.38 2.13 2.15.36 3.94 0 6.36 0 9.55v12.88c0 3.22.35 5.65 2.13 7.44C3.92 31.64 6.36 32 9.6 32h12.84zM16 23.85a1.7 1.7 0 0 1-1.77-1.77v-4.3h-4.3a1.7 1.7 0 0 1-1.77-1.75c0-1.06.75-1.8 1.77-1.8h4.3v-4.3A1.7 1.7 0 0 1 16 8.15c1.04 0 1.79.75 1.79 1.79v4.28h4.3c1.02 0 1.77.75 1.77 1.8a1.7 1.7 0 0 1-1.77 1.76h-4.3v4.3a1.7 1.7 0 0 1-1.8 1.77z"/></svg></button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#5B2491" d="M22.43 32c3.22 0 5.67-.36 7.45-2.13 1.77-1.79 2.12-4.22 2.12-7.44V9.59c0-3.24-.35-5.67-2.12-7.44C28.1.38 25.65 0 22.43 0H9.55C6.38 0 3.92.38 2.13 2.15.36 3.94 0 6.36 0 9.55v12.88c0 3.22.35 5.65 2.13 7.44C3.92 31.64 6.36 32 9.6 32h12.84zm.26-14.24H9.44c-1.1 0-1.88-.67-1.88-1.75s.74-1.77 1.88-1.77h13.25c1.13 0 1.87.69 1.87 1.77s-.75 1.75-1.87 1.75z"/></svg></button>';
}

add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max );
            } else {
               qty.val( val + step );
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min );
            } else if ( val > 1 ) {
               qty.val( val - step );
            }
         }
 
      });
        
   " );
}

function e12_remove_product_image_link( $html, $post_id ) {
  return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'e12_remove_product_image_link', 10, 2 );

add_action( 'woocommerce_after_shop_loop_item_title', 'bbloomer_show_all_subcats', 2 );
 
function bbloomer_show_all_subcats() {
   global $product;
   $cats = get_the_terms( $product->get_id(), 'product_cat' );
   if ( empty( $cats ) ) return;
   echo '<span class="cat_name">'. join( ', ', wp_list_pluck( $cats, 'name' ) ) .'</span>';
}

function woo_dequeue_select2() {
  if ( class_exists( 'woocommerce' ) ) {
      wp_dequeue_style( 'select2' );
      wp_deregister_style( 'select2' );

      wp_dequeue_script( 'selectWoo');
      wp_deregister_script('selectWoo');
  } 
}
add_action( 'wp_enqueue_scripts', 'woo_dequeue_select2', 100 );
