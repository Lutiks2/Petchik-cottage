<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Houses
 * @since 1.0
 * @version 1.0
 */

get_header('front-page'); ?>

        <section>
            <div class="about" style="background: <?php echo get_theme_mod('backgr_color'); ?>">
                <div class="container">
                    <p><?php echo get_theme_mod('about_description'); ?></p>
                </div>
            </div>
            <div class="container">
                <ul class="about-list clearfix">
                    <?php
                    $args = [
                        'post_type' => 'about',
                        'order' => 'ASC',
                        'posts_per_page' => 3,
                    ];
                    query_posts($args);
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/about/content', 'about');
                    endwhile;
                    ?>
                </ul>
            </div>
        </section>
        <section class="our-works container">
            <div class="heading">
                <h2><?php echo get_theme_mod('our_works_heading'); ?></h2>
                <span><?php echo get_theme_mod('our_works_description'); ?></span>
            </div>
            <ul class="our-works-list">
                <?php
                $args = [
                    'post_type' => 'our_works',
                    'order' => 'ASC',
                    'posts_per_page' => 8,
                ];
                query_posts($args);
                while (have_posts()) : the_post();
                    get_template_part('template-parts/our-works/content', 'our_works');
                endwhile;
                ?>
            </ul>
        </section>
        <section class="rewiews"
                 style="background: url('<?php echo get_theme_mod('reviwes_background'); ?>') no-repeat center/cover">
            <div class="container">
                <div class="my-slider">
                    <div class="heading">
                        <h2><?php echo get_theme_mod('reviwes_heading'); ?></h2>
                    </div>
                    <?php echo do_shortcode('[slick-slider design="design-5"]'); ?>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="heading">
                <h2><?php echo get_theme_mod('prices_heading'); ?></h2>
                <span><?php echo get_theme_mod('prices_description'); ?></span>
            </div>
            <ul class="price-list clearfix">
                <?php
                $args = [
                    'post_type' => 'houses_price',
                    'order' => 'ASC',
                    'posts_per_page' => 3,
                ];
                query_posts($args);
                while (have_posts()) : the_post();
                    get_template_part('template-parts/prices/content', 'prices');
                endwhile;
                ?>
            </ul>
        </section>
        <section class="faq" style="background: <?php echo get_theme_mod('faq_backgr_color'); ?>">
            <div class="container">
                <div class="heading">
                    <h2><?php echo get_theme_mod('faq_heading'); ?></h2>
                    <span><?php echo get_theme_mod('faq_description'); ?></span>
                </div>
                <ul class="faq-list">
                    <?php
                    $args = [
                        'post_type' => 'houses_faq',
                        'order' => 'ASC',
                        'posts_per_page' => 4,
                    ];
                    query_posts($args);
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/faq/content', 'houses_faq');
                    endwhile;
                    ?>
                </ul>
            </div>
        </section>
        <section class="blog container"> <!-----section blog---->
            <div class="heading">
                <h2><?php echo get_theme_mod('blog_heading'); ?></h2>
                <span><?php echo get_theme_mod('blog_description'); ?></span>
            </div>
            <?php $myquery = new WP_Query('orderby=date&posts_per_page=2'); ?>
            <ul class="post-list">
                <?php while ($myquery->have_posts()): $myquery->the_post();
                    get_template_part('template-parts/blog/content', 'blog-page');
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
            <div class="home-blog-button">
                <a class="button button-blog"
                   href="<?php echo get_theme_mod('blog_url_button'); ?>"
                   style="background: <?php echo get_theme_mod('blog_button_color'); ?>"
                   onmouseover="this.style.backgroundColor='#36a8ff';"
                   onmouseout="this.style.backgroundColor='<?php echo get_theme_mod('blog_button_color'); ?>'">
                    <?php echo get_theme_mod('blog_button'); ?>
                </a>
            </div>
        </section><!-----end section blog---->

<?php get_footer(); ?>
<?php get_footer('lite');

