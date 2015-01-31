<!DOCTYPE HTML>
<html>
    <head>
        <?php wp_head()//Declare <head> tag for plugin compatibility ?>
        <link href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/materialize/dist/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <script src="<?php echo get_template_directory_uri(); ?>/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/materialize/dist/js/materialize.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    </head>

    <body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full"><i class="left mdi-navigation-menu"></i></a>
                <a href="<?php echo bloginfo('url'); ?>" class="brand-logo"><?php echo bloginfo("name"); ?></a>
                <?php
                class NavMenuWalker extends Walker_Nav_Menu{
                    //Before menu, create container
                    public function start_lvl(&$output, $depth = 0, $args = array()){
                        if(isset($args->walker->has_children) && $args->walker->has_children) {
                            $output .= "<ul id=\"dropdown1\" class=\"dropdown-content\">";
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
                            $output .= "<a class=\"dropdown-button\" href=\"#!\" title=\"$item->attr_tittle\" data-activates=\"dropdown1\">";
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