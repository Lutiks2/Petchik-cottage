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
    <div id="primary" class="content-area">
        <ul class="blog-page">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = [
//                'order' => 'ASC',
                'posts_per_page' => 2,
                'paged' => $paged,
            ];
            query_posts($args);
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/blog/content', 'blog-page');

            endwhile; ?>
           <?php if (  $wp_query->max_num_pages > 1 ) : ?>
            <script>
              var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
              var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
              var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
              var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <div id="true_loadmore" class="load-my-posts">Load more</div>
            <?php endif;?>
<!--            wp_pagenavi(); ?>-->
        </ul>
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
get_footer('lite');
