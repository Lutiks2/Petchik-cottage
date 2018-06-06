<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Houses
 */

?>

<li>
    <div>
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="blog-heading-post clearfix">
        <span class="my-date">
            <?php the_modified_date('j</\b\r> M'); ?>
        </span>
        <h3 class="heading-post">
            <a href="<?php the_permalink(); ?>" class="title-home-post">
                <?php the_title(); ?>
            </a>
        </h3>
    </div>
    <div class="excerpt"><?php the_content('<span class="reed">Reed more</span>'); ?></div>
</li>