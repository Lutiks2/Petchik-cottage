<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Houses
 */

?>

<footer class="big-footer" style="background: <?php echo get_theme_mod('footer_backgr_color'); ?>">
    <div class="container">
        <div class="logo-footer">
            <img src="<?php echo get_theme_mod('footer_logo'); ?>">
        </div>
        <div class="main-footer">
            <div class="footer-descrip">
                <p>
                    <?php echo get_theme_mod('footer_description'); ?>
                </p>
            </div>
            <div class="phone-block">
                <h4>
                    <?php echo get_theme_mod('footer_number_heading'); ?>
                </h4>
                <span>
                <?php echo get_theme_mod('footer_number'); ?>
            </span>
                <span>
                <?php echo get_theme_mod('footer_number_2'); ?>
            </span>
            </div>
            <div class="address-block">
                <h4>
                    <?php echo get_theme_mod('footer_address_heading'); ?>
                </h4>
                <span>
                <?php echo get_theme_mod('footer_address_street'); ?>
            </span>
                <span>
                <?php echo get_theme_mod('footer_address_city'); ?>
            </span>
            </div>
            <div class="button-block">
                <a class="button button-blog"
                   href="tel:<?php echo get_theme_mod('footer_url_button'); ?>"
                   style="background: <?php echo get_theme_mod('footer_button_color'); ?>"
                   onmouseover="this.style.backgroundColor='#36a8ff';"
                   onmouseout="this.style.backgroundColor='<?php echo get_theme_mod('footer_button_color'); ?>'">
                    <?php echo get_theme_mod('footer_button'); ?>
                </a>
            </div>
        </div>
    </div>
</footer>
