<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/css/OverlayScrollbars.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.3/css/bulma.min.css" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- START NAV -->
    <nav class="navbar">
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
                ?>
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