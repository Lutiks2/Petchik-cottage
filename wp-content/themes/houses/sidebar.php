<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Houses
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
    <div class="my-recent-post">
        <h2>Resent Post</h2>
        <ul>
            <?php query_posts('showposts=4'); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="resent-list clearfix">
                    <div class="lasttumb">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?>
                        </a>
                    </div>
                    <div class="last-text">
                        <div class="clearfix">
                            <span class="last-date"><?php the_modified_date('j F, Y'); ?></span>
                            <span class="last-comment"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                <?php comments_number( '0', '1', '%' ); ?></span>
                        </div>
                        <h3><?php the_title(); ?></h3>
                    </div>
                </li>
            <?php endwhile;
            endif; ?>
        </ul>
    </div>
</aside><!-- #secondary -->
</div> <!--   content   -->