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

function themeCustomizerRegister($wp_customize){
  /* Add Settings */
  $wp_customize->add_setting("primary_color", array(
    "default" => "#F6115F"
  ));

  $wp_customize->add_setting("secondary_color", array(
    "default" => "#00BCD4"
  ));

  /* Add Setting Controls */
  $wp_customize->add_control(new WP_Customize_Color_Control(
      $wp_customize,
      "control_primary_color",
      array(
        "label" => "Primary Color",
        "section" => "colors",
        "settings" => "primary_color"
      )
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control(
      $wp_customize,
      "control_secondary_color",
      array(
        "label" => "Secondary Color",
        "section" => "colors",
        "settings" => "secondary_color"
      )
  ));
}

function themeCustomizerCSSInject(){
  echo "<style>";

  echo ".background-primary{background: " . get_theme_mod("primary_color", "#F6115F") . ";}";
  echo ".background-secondary{background: " . get_theme_mod("secondary_color", "#00BCD4") . ";}";

  echo ".color-primary{color: " . get_theme_mod("primary_color", "#F6115F") . ";}";
  echo ".color-secondary{background: " . get_theme_mod("secondary_color", "#00BCD4") . ";}";

  echo "</style>";
}

function themeSupportDeclaration(){
    add_theme_support("menus");
    add_theme_support("html5");
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "themeSupportDeclaration");
add_action("customize_register", "themeCustomizerRegister");
add_action( 'wp_head', 'themeCustomizerCSSInject');
?>
