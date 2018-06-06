<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Houses
 */

get_header();
?>

    <div class="content container clearfix">
    <div id="primary">
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
        <ul class="about-list about-list-page clearfix">
            <?php
            $args = [
                'post_type' => 'about',
                'order' => 'ASC',
                'posts_per_page' => 3,
            ];
            query_posts($args);
            while (have_posts()) : the_post();
                get_template_part('template-parts/about/content', 'about');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
        </ul>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
get_footer('lite');
