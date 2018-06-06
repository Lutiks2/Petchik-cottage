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

<footer class="lite-footer" style="background: <?php echo get_theme_mod('footer_lite_backgr_color'); ?>">
    <div class="container clearfix">
        <div class="copywrite">
            <span><?php echo get_theme_mod('footer_copywrite'); ?></span>
            <span><?php echo get_theme_mod('footer_span'); ?></span>
        </div>
        <div class="footer-list">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_id' => 'footer-lite',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'footer-menu clearfix',
            ));
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
