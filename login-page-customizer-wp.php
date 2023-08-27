<?php
/**
 * Plugin Name: Login Page Customizer WP
 * Description: Customize the WordPress login page.
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author: Nazmul Siddique 
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

/* Loading Css File */
function lpcwp_login_page_customizer_register(){
    wp_enqueue_style('lpcwp_login_enqueue', plugins_url('css/lpcwp-style.css', __FILE__), false, "1.0,0");
}
add_action('login_enqueue_scripts', 'lpcwp_login_page_customizer_register');
/* Loading Admin Panel Css File */
function lpcwp_admin_login_page_customizer_register(){
    wp_enqueue_style('lpcwp-admin-style', plugins_url('css/lpcwp-admin-style.css', __FILE__), false, "1.0,0");
}
add_action('admin_enqueue_scripts', 'lpcwp_admin_login_page_customizer_register');

/*
* Plugins Call Back Function
 */
function lpcwp_create_page(){ ?>
<div class="lpcwp-main-area">
    <div class="lpcwp-body-area lpcwp-common">
        <div id="title">
            <h2> <?php  print esc_attr('Login Page Customizer Option'); ?> </h2>
        </div>
        <form action="options.php" method="post">
            <?php wp_nonce_field('update-options'); ?>
            <label for="lpcwp-primary-color"
                name="lpcwp-primary-color"><?php  print esc_attr('Primary Color'); ?></label>
            <input type="color" name="lpcwp-primary-color" value="<?php print get_option('lpcwp-primary-color') ?>">

            <label for="lpcwp-custom-bg-url"
                name="lpcwp-custom-bg-url"><?php  print esc_attr('Main Background'); ?></label>
            <input type="text" name="lpcwp-custom-bg-url" value="<?php print get_option('lpcwp-custom-bg-url') ?>"
                placeholder="Paste your background image url here">

            <label for="lpcwp-custom-logo-url"
                name="lpcwp-custom-logo-url"><?php  print esc_attr('Main Logo'); ?></label>
            <input type="text" name="lpcwp-custom-logo-url" value="<?php print get_option('lpcwp-custom-logo-url') ?>"
                placeholder="Paste your logo image url here">

            <label for="lpcwp-custom-background-opacity"
                name="lpcwp-custom-background-opacity"><?php  print esc_attr('Background Opacity Between 0.1 to 1.0'); ?></label>
            <input type="text" name="lpcwp-custom-background-opacity"
                value="<?php print get_option('lpcwp-custom-background-opacity') ?>"
                placeholder="Type your background opacity between 0.1 to 1.0">

            <input type="hidden" name="action" value="update">
            <input type="hidden" name="page_options"
                value="lpcwp-primary-color, lpcwp-custom-bg-url, lpcwp-custom-logo-url, lpcwp-custom-background-opacity">
            <input type="submit" name="submit" class="button button-primary"
                value="<?php _e('Save Changes', 'lpcwp') ?>">
        </form>
    </div>
    <div class="lpcwp-sidebar-area lpcwp-common">
        <div id="title">
            <h2> <?php  print esc_attr('About Author'); ?> </h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus neque ipsam quis laborum tempore
                deleniti!</p>
        </div>
    </div>
</div>


<?php
}

/* Change Logo */
function lpcwp_logo_change(){
?>
    <style>
        body.login {
            background-image: url(<?php print get_option('lpcwp-custom-bg-url') ?>) !important;
        }
        body.login::after {
            opacity: <?php print get_option('lpcwp-custom-background-opacity') ?> !important;
        }
        #login h1 a,
        .login h1 a {
            background-image: url(<?php print get_option('lpcwp-custom-logo-url') ?>) !important;
        }

        #login form p.submit input {
            background: <?php print get_option('lpcwp-primary-color') ?> !important;
        }

        .login #login_error,
        .login .message,
        .login .success {
            border-left: 4px solid <?php print get_option('lpcwp-primary-color') ?> !important;
        }

        input#user_login,
        input#user_pass {
            border-left: 4px solid <?php print get_option('lpcwp-primary-color') ?> !important;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'lpcwp_logo_change');
/* Change Logo url */
function lpcwp_logo_url_change(){
    return home_url();
}

add_action('login_headerurl', 'lpcwp_logo_url_change');
 ?>