<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Houses
 */

get_header();
?>

    <div class="content container clearfix">
    <div id="primary">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header><!-- .page-header -->
            <ul  class="my-archive">
            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
//				get_template_part( 'template-parts/content', get_post_type() );
                get_template_part('template-parts/blog/content-blog-page', get_post_type());
            endwhile;

            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>
            </ul>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
get_footer('lite');
