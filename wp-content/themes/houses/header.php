<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Houses
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header">
    <div class="wrap-header">
        <div class="nav-panel container clearfix">
            <div class="logo-nav clearfix">
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div><!-- .site-branding -->

                <nav class="main-navigation">
                    <a class="menu-bat" href="#">
                        <span class="fa fa-bars"></span>
                    </a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'menu_id' => 'header',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'welcome-list clearfix',
                    ));
                    ?>
                </nav><!-- #site-navigation -->
            </div>
            <div class="language-search clearfix">
                <div class="lang-block">
                    <span class="language">Eng</span>
                    <span class="sort"><i class="fa fa-sort-desc" aria-hidden="true"></i></span>
                </div>
                <i class="fa fa-search" aria-hidden="true"></i>
                <div class="search-block position-search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->



