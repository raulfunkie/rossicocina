<?php

/*
    Plugin Name: RossiCocina Settings Page
    description: Setting up configurable fields.
    Author: Raúl Rincón
    Version: 1.0.0
*/
class Smashing_Fields_Plugin {
  public function __construct() {
      // Hook into the admin menu
    add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
    add_action( 'admin_init', array( $this, 'setup_sections' ) );
    add_action( 'admin_init', array( $this, 'setup_fields' ) );
  }
  
  public function create_plugin_settings_page() {
    // Add the menu item and page
    $page_title = 'Configuración de RossiCocina.com';
    $menu_title = 'RossiCocina';
    $capability = 'manage_options';
    $slug = 'rossicocina_settings';
    $callback = array( $this, 'plugin_settings_page_content' );
    $icon = 'dashicons-admin-plugins';
    $position = 1;

    add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
  }
  
  public function plugin_settings_page_content() { ?>
    <div class="wrap">
        <h2>Configuración RossiCocina Web</h2>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'rossicocina_settings' );
                do_settings_sections( 'rossicocina_settings' );
                submit_button();
            ?>
        </form>
    </div> <?php
  }
  
  public function setup_sections() {
    add_settings_section( 'intro', 'Pagina Principal', array( $this, 'section_callback' ), 'rossicocina_settings' );
    add_settings_section( 'social', 'Redes Sociales', array( $this, 'section_callback' ), 'rossicocina_settings' );
    add_settings_section( 'podcast', 'Podcast Links', array( $this, 'section_callback' ), 'rossicocina_settings' );
  }
  
  public function section_callback( $arguments ) {
    switch( $arguments['id'] ){
        case 'intro':
            echo 'Configurar texto Introductorio';
            break;
        case 'social':
            echo 'Configurar Usuarios de Redes Sociales';
            break;
        case 'podcast':
            echo 'Copiar el enlace completo en todos los casos';
            break;
    }
  }
  
  public function setup_fields() {
    $fields = array(
      array(
        'uid' => 'rc_intro_text',
        'label' => 'Texto Introductorio',
        'section' => 'intro',
        'type' => 'textarea',
        'supplimental' => 'Este es el texto que sale en la pagina principal debajo de tu logo.',
      ),
      array(
        'uid' => 'tw_username',
        'label' => 'Twitter',
        'section' => 'social',
        'type' => 'text',
        'placeholder' => 'ej: raulrinc0n',
        'supplimental' => 'Escribir el nombre de usuario sin el "@"',
      ),
      array(
        'uid' => 'ig_username',
        'label' => 'Instagram',
        'section' => 'social',
        'type' => 'text',
        'placeholder' => 'ej: joerogan',
        'supplimental' => 'Escribir el nombre de usuario sin el "@"',
      ),
      array(
        'uid' => 'yt_username',
        'label' => 'Youtube',
        'section' => 'social',
        'type' => 'text',
        'placeholder' => 'ej: rossicocina',
        'supplimental' => 'Escribir solo el nombre del canal',
      ),
      array(
        'uid' => 'fb_username',
        'label' => 'Facebook',
        'section' => 'social',
        'type' => 'text',
        'placeholder' => 'ej: rossicocina',
        'supplimental' => 'Escribir solo el usuario del perfil',
      ),
      array(
        'uid' => 'spotify',
        'label' => 'Spotify',
        'section' => 'podcast',
        'type' => 'text',
        'placeholder' => 'htps://...',
      ),
      array(
        'uid' => 'apple',
        'label' => 'Apple Podcasts',
        'section' => 'podcast',
        'type' => 'text',
        'placeholder' => 'htps://...',
      ),
      array(
        'uid' => 'google',
        'label' => 'Google Podcasts',
        'section' => 'podcast',
        'type' => 'text',
        'placeholder' => 'htps://...',
      ),
      array(
        'uid' => 'anchor',
        'label' => 'Anchor.fm',
        'section' => 'podcast',
        'type' => 'text',
        'placeholder' => 'htps://...',
      )
    );
  foreach( $fields as $field ){

      add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'rossicocina_settings', $field['section'], $field );
        register_setting( 'rossicocina_settings', $field['uid'] );
  }
}

public function field_callback( $arguments ) {

    $value = get_option( $arguments['uid'] );

    if( ! $value ) {
        $value = $arguments['default'];
    }

    switch( $arguments['type'] ){
        case 'text':
        case 'password':
        case 'number':
            printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
            break;
        case 'textarea':
            printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
            break;
        case 'select':
        case 'multiselect':
            if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                $attributes = '';
                $options_markup = '';
                foreach( $arguments['options'] as $key => $label ){
                    $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value[ array_search( $key, $value, true ) ], $key, false ), $label );
                }
                if( $arguments['type'] === 'multiselect' ){
                    $attributes = ' multiple="multiple" ';
                }
                printf( '<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup );
            }
            break;
        case 'radio':
        case 'checkbox':
            if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                $options_markup = '';
                $iterator = 0;
                foreach( $arguments['options'] as $key => $label ){
                    $iterator++;
                    $options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
                }
                printf( '<fieldset>%s</fieldset>', $options_markup );
            }
            break;
    }

    if( $helper = $arguments['helper'] ){
        printf( '<span class="helper"> %s</span>', $helper );
    }

    if( $supplimental = $arguments['supplimental'] ){
        printf( '<p class="description">%s</p>', $supplimental );
    }

  }
}
new Smashing_Fields_Plugin();