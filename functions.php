<?php
/*
 * Available Customizer options are
 *      title_tagline
 *      colors
 *      header_image
 *      background_image
 *      nav
 *      static_front_page
 * These Customizer options can be used inline like so:
 *      <?php echo get_theme_mod('HOOK_NAME', DEFAULT_VALUE); ?>
 */

function get(&$var, $default=null){
    try{
        return isset($var) ? $var : $default;
    } catch(Exception $e){
        return $default;
    }
}

function themeSupportDeclaration(){
    add_theme_support("menus");
    add_theme_support("html5");
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "themeSupportDeclaration");
?>