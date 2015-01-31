<!DOCTYPE HTML>
<html>
    <head>
        <?php wp_head()//Declare <head> tag for plugin compatibility ?>
        <link href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/materialize/dist/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>

    <body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="<?php echo bloginfo('url'); ?>" class="brand-logo"><?php echo bloginfo("name"); ?></a>
                <?php
                $menuConfig = array(
                    "container" => false,
                    "menu_id" => "nav-mobile",
                    "menu_class" => "right side-nav"
                );

                wp_nav_menu($menuConfig);
                ?>
            </div>
        </nav>
    </div>