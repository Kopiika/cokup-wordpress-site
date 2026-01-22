<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" sizes="32x32" />

</head>

<body <?php body_class(); ?>>

    <header>
        <div class="container">
            <!-- site title -->
            <h1 class="site-title">
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </h1>

            <!-- Burger button (visible on mobile) -->
            <div class="burger" id="burger">☰</div>

            <!-- Main menu -->
            <nav class="main-nav" id="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'menu',
                ));
                ?>
            </nav>
        </div>
    </header>

    <main class="site-content">
