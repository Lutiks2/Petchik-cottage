<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Houses
 */

get_header();
?>
    <div class="content container clearfix">
    <div id="primary" class="content-area">
        <div class="single-blog-post">
            <?php

            while (have_posts()) :
                the_post();

                get_template_part('template-parts/blog/content-blog-single',
                    get_post_type());

            endwhile; // End of the loop.
            ?>
        </div>
        <div class="heading-nav clearfix">
            <h2>Related post</h2>
            <div class="singl-nav">
                <?php the_post_navigation(array(
                    'next_text' => '<span class="screen-reader-text">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span> ',
                    'prev_text' => '<span class="screen-reader-text">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </span> ',
                )); ?>
            </div>
        </div>
        <div class="block-related-post">

            <?php
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $tag_ids = array();
                foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args = array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'showposts' => 3,
                    'caller_get_posts' => 1
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    echo '<ul class="my-related-post">';
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                        <li class="related-post-li">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                    the_post_thumbnail();
                                }
                                ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <ul class="heading-list">
                                <li>By <?php the_author(); ?></li>
                                <li><?php comments_number('0 comment', '1 comment', '% comment'); ?></li>
                            </ul>
                            <div class="excerpt"><?php the_content(''); ?></div>
                            <div class="wrap-button-post">
                                <a class="button button-related-post"
                                    href="<?php the_permalink(); ?>"
                                    style="background: <?php echo get_theme_mod('related_posts_button_color'); ?>"
                                    onmouseover="this.style.backgroundColor='#36a8ff';"
                                    onmouseout="this.style.backgroundColor='<?php echo get_theme_mod('related_posts_button_color'); ?>'">
                                    <?php echo get_theme_mod('related_posts_button'); ?>
                                </a>
                            </div>

                        </li>


                        <?php
                    }
                    echo '</ul>';
                }
            }
            ?>
        </div>

    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
get_footer('lite');
