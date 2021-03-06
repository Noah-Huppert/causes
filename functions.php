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
 function getCustomizerDefaults(){
   return array(
     "primary_color" => "#00BCD4",
     "secondary_color" => "#F6115F",
     "copyright_notice" =>"©"
   );
 }

function themeCustomizerRegister($wp_customize){
  /* Add Settings */
  $wp_customize->add_setting("primary_color", array(
    "default" => getCustomizerDefaults()["primary_color"]
  ));

  $wp_customize->add_setting("secondary_color", array(
    "default" => getCustomizerDefaults()["secondary_color"]
  ));

  $wp_customize->add_setting("copyright_notice", array(
    "default" => getCustomizerDefaults()["copyright_notice"] . get_bloginfo("name")
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

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      "control_copyright_notice",
      array(
        "label" => "Copyright Notice",
        "section" => "title_tagline",
        "settings" => "copyright_notice"
      )
  ));
}

function themeCustomizerCSSInject(){
  echo "<style>";

  echo ".background-primary{background-color: " . get_theme_mod("primary_color", getCustomizerDefaults()["primary_color"]) . " !important;}";
  echo ".background-secondary{background-color: " . get_theme_mod("secondary_color", getCustomizerDefaults()["secondary_color"]) . " !important;}";

  echo ".color-primary{color: " . get_theme_mod("primary_color", getCustomizerDefaults()["primary_color"]) . " !important;}";
  echo ".color-secondary{color: " . get_theme_mod("secondary_color", getCustomizerDefaults()["secondary_color"]) . " !important;}";

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
