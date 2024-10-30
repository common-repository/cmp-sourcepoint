<?php
defined('ABSPATH') or die("Thanks for visting");

/**
 * Plugin Name:  CMP-Sourcepoint
 * Description: Plugin to configure CMP-Settings for Sourcepoint
 * Version: 1.0
 * Author: Handelsblatt Media Group
 * Author URI: https://handelsblattgroup.com/
 * License: GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  cmp-sourcepoint-plugin
 */

update_option( 'pluginPath', plugin_dir_path( __DIR__ ).'/cmp-sourcepoint');

if(get_option('cmp-config') == '') {
    update_option('cmp-config', file_get_contents(get_option('pluginPath').'/wp_cmp_config.js'));
}

add_action('wp_head', 'add_CMP_snippets');
function add_CMP_snippets(){

    ?>

  <script><?php echo get_option('cmp-config'); ?></script>
  <script><?php echo file_get_contents(get_option('pluginPath').'/cmp-min.js'); ?></script>


    <?php
};


add_action( 'admin_menu', 'cmp_add_admin_menu' );
add_action( 'admin_init', 'cmp_settings_init' );


function cmp_add_admin_menu(  ) {

    add_options_page( 'cmp-sourcepoint', 'cmp-sourcepoint', 'manage_options', 'cmp-sourcepoint', 'cmp_options_page' );

}


function cmp_settings_init(  ) {

    register_setting( 'pluginPage', 'cmp_settings' );
    register_setting( 'cmp_options', 'cmp_textarea_field_0');

    add_settings_section(
        'cmp_pluginPage_section',
        __( 'Your section description', 'wordpress' ),
        'cmp_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'cmp_textarea_field_0',
        __( 'Settings field description', 'wordpress' ),
        'cmp_textarea_field_0_render',
        'pluginPage',
        'cmp_pluginPage_section'
    );


}


function cmp_textarea_field_0_render(  ) {

    ?>
  <textarea cols='80' rows='50' name='cmp_settings[cmp_textarea_field_0]'>
    <?php echo get_option('cmp-config'); ?>
  </textarea>
    <?php

}


function cmp_settings_section_callback(  ) {

    $options = get_option( 'cmp_settings' );

    echo __( 'This section description', 'wordpress' );

    if (isset($_GET['settings-updated'])) {
        $currentSetting = $options['cmp_textarea_field_0'];
        update_option('cmp-config', $currentSetting);
    }

}


function cmp_options_page(  ) {

    ?>
  <form action='options.php' method='post'>

    <h2>cmp-sourcepoint</h2>

      <?php
      settings_fields( 'pluginPage' );
      do_settings_sections( 'pluginPage' );
      submit_button();
      ?>

  </form>
    <?php

}

?>
