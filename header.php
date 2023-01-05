<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <?php wp_head(); ?>
    <style>
    .hero-body{
        background-image: url(https://picsum.photos/1200/500/);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 500px;
    }
  </style>
</head>

<body <?php body_class('has-navbar-fixed-top'); ?>>
<?php wp_body_open(); ?>
    <!-- START NAV -->
    <nav class="navbar is-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <?php the_logo_thumbnail(); ?>
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <?php
                $menu = wp_nav_menu(
                    array(
                        'echo'  => false,
                        'walker' => new Feed_Nav_Walker,
                        'container'		 => 'div',
                        'container_class'   => 'navbar-end',
                        'theme_location' => 'menu-1',
                        // 'menu_id'        => 'main-menu',
                        'items_wrap'    => '%3$s',
                        'menu_class'	 => 'navbar-end',

                    )
                );

                $menu_parsed = preg_replace(array('/<ul>/','/<\/ul>/'), '', $menu );
                echo $menu_parsed;
                
                get_search_form(); ?>
                <!-- <div class="navbar-end">
                    <a class="navbar-item is-active">
                            Home
                        </a>
                    <a class="navbar-item">
                            Examples
                        </a>
                    <a class="navbar-item">
                            Features
                        </a>
                    <a class="navbar-item">
                            Team
                        </a>
                    <a class="navbar-item">
                            Archives
                        </a>
                    <a class="navbar-item">
                            Help
                        </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                                Account
                            </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                    Dashboard
                                </a>
                            <a class="navbar-item">
                                    Profile
                                </a>
                            <a class="navbar-item">
                                    Settings
                                </a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">
                                Logout
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </nav>
    <!-- END NAV -->