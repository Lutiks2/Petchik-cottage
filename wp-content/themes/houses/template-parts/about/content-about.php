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
    <div class="about-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="about-content">
        <h3><?php the_title(); ?></h3>
        <p><?php the_content(); ?></p>
    </div>

</li>