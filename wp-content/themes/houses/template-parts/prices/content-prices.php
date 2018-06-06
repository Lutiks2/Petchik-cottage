<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Houses
 */

?>

<li class="price-list-section price-list-section-page">
    <div class="price-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="price-list-heading clearfix">
        <h3 class="">
            <a href="<?php the_permalink(); ?>" class="title-home-post">
                <?php the_title(); ?>
            </a>
        </h3>
        <p><?php the_content();?></p>
    </div>
    <ul class="price-item">

        <li class="base">
            <div class="clearfix">
                <img class="price-item-img" src="<?php the_field('base_img'); ?>" />
                <div class="price-item-content">
                    <h4><?php the_field('base'); ?></h4>
                    <p><?php the_field('base_text'); ?></p>
                </div>
            </div>
        </li>
        <li class="roof">
            <div class="clearfix">
                <img class="price-item-img" src="<?php the_field('roof_img'); ?>" />
                <div class="price-item-content">
                    <h4><?php the_field('roof'); ?></h4>
                    <p><?php the_field('roof_text'); ?></p>
                </div>
            </div>
        </li>
        <li class="facade">
            <div class="clearfix">
                <img class="price-item-img" src="<?php the_field('facade_img'); ?>" />
                <div class="price-item-content">
                    <h4><?php the_field('facade'); ?></h4>
                    <p><?php the_field('facade_text'); ?></p>
                </div>
            </div>
        </li>
        <li class="interior">
            <div class="clearfix">
                <img class="price-item-img" src="<?php the_field('interior_img'); ?>" />
                <div class="price-item-content">
                    <h4><?php the_field('interior'); ?></h4>
                    <p><?php the_field('interior_text'); ?></p>
                </div>
            </div>
        </li>
        <li class="system">
            <div class="clearfix">
                <img class="price-item-img" src="<?php the_field('system_and_interior_img'); ?>" />
                <div class="price-item-content">
                    <h4><?php the_field('system_and_interior'); ?></h4>
                    <p><?php the_field('system_and_interior_text'); ?></p>
                </div>
            </div>
        </li>
    </ul>
    <div class="wrap-button-price">
    <a class="button button-price"
       href="<?php echo get_theme_mod('blog_url_button'); ?>"
       style="background: <?php echo get_theme_mod('blog_button_color'); ?>"
       onmouseover="this.style.backgroundColor='#36a8ff';"
       onmouseout="this.style.backgroundColor='<?php echo get_theme_mod('blog_button_color'); ?>'">
        Contact us
    </a>
    </div>
</li>
