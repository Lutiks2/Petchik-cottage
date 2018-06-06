<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Houses
 */

?>

<div>
    <div>
        <?php the_post_thumbnail(); ?>
    </div>
    <h1 class="heading-single-post"><?php the_title(); ?></h1>
    <ul class="heading-list">
        <li>By <?php the_author(); ?></li>
        <li><?php $category = get_the_category();
            echo $category[0]->cat_name; ?></li>
        <li><?php comments_number('0 comment', '1 comment', '% comment'); ?></li>
        <li><?php the_modified_date('j F, Y'); ?></li>
        <li><i class="fa fa-heart-o" aria-hidden="true"></i>
            <?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?></li>
    </ul>
    <div class="content-single-post"><?php the_content(); ?></div>
</div>