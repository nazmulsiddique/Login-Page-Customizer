<?php
/**
 * Plugin Name: Login Page Customizer
 * Description: Customize the WordPress login page.
 * Version: 1.0
 * Author: Ghatail IT By Nazmul Siddique 
 * Author URI: www.ghatailit.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * text Domain: lpcwp
 */

/*
* Plugins Option Page Function
 */
// Add settings page
function lpcwp_login_page_customizer_settings_page() {
    add_menu_page('Login Option for Admin', 'Login Option', 'manage_options', 'lpcwp-plugin-option', 'lpcwp_create_page', 'dashicons-unlock', '101');
}
add_action('admin_menu', 'lpcwp_login_page_customizer_settings_page');

/*
* Plugins Call Back Function
 */
function lpcwp_create_page(){ ?>
    <h2> <?php  echo "Login Page Customizer Option Page"; ?> </h2> <?php
}


 ?>