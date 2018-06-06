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
                <div class="search-block position-search-main">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
    <section class="welcome"
             style="background: url('<?php echo get_theme_mod('set_background'); ?>') no-repeat center/cover">
        <div class="container">
            <p class="welcome-description"><?php echo get_bloginfo('description', 'display'); ?></p>
            <p class="welcome-about"><?php echo get_theme_mod('about'); ?></p>
            <div class="welcome-button">
                <a class="button button-header"
                   href="tel:<?php echo get_theme_mod('url_button'); ?>"
                   style="background: <?php echo get_theme_mod('header_button_color'); ?>"
                   onmouseover="this.style.backgroundColor='#36a8ff';"
                   onmouseout="this.style.backgroundColor='<?php echo get_theme_mod('header_button_color'); ?>'">
                    <?php echo get_theme_mod('text_button'); ?>
                </a>
            </div>
        </div>
    </section>
</header><!-- #masthead -->



