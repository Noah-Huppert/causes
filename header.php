<!DOCTYPE HTML>
<html>
    <head>
        <?php wp_head()//Declare <head> tag for plugin compatibility ?>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/materialize/dist/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" rel="stylesheet"/>

        <script src="<?php echo get_template_directory_uri(); ?>/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/materialize/dist/js/materialize.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    </head>

    <body class="background-primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper background-primary">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full"><i class="left mdi-navigation-menu"></i></a>
                <a href="<?php echo bloginfo('url'); ?>" class="brand-logo"><?php echo bloginfo("name"); ?></a>
                <?php
                class NavMenuWalker extends Walker_Nav_Menu{
                    //Before menu, create container
                    public function start_lvl(&$output, $depth = 0, $args = array()){
                        if(isset($args->walker->has_children) && $args->walker->has_children) {
                            $output .= "<ul id=\"causes-main-nav-dropdown\" class=\"dropdown-content\">";
                        } else{
                            $output .= "<ul id=\"nav-mobile\" class=\"right side-nav\">";
                        }
                    }

                    //After menu, closes container
                    public function end_lvl(&$output, $depth = 0, $args = array()){
                        $output .= "</ul>";
                    }

                    //Start of item
                    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
                        $output .= "<li>";

                        if(isset($args->walker->has_children) && $args->walker->has_children) {
                            $output .= "<a class=\"dropdown-button\" href=\"#!\" title=\"$item->attr_tittle\" data-activates=\"causes-main-nav-dropdown\">";
                            $output .= "<i class=\"mdi-navigation-arrow-drop-down right\"></i>";
                        } else {
                            $output .= "<a data-id=\"$id\" title=\"$item->attr_title\" target=\"$item->target\" rel=\"$item->xfn\" href=\"$item->url\">";
                        }

                        $output .= apply_filters( 'the_title', $item->title, $item->ID );
                        $output .= "</a>";
                    }

                    //End of item
                    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
                        $output .= "</li>";
                    }
                }

                $menuConfig = array(
                    "container" => false,
                    "menu_id" => "nav-mobile",
                    "menu_class" => "right side-nav",
                    "walker" => new NavMenuWalker()
                );

                wp_nav_menu($menuConfig);
                ?>
            </div>
        </nav>
    </div>
