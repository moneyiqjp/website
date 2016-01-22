<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div style="background: linear-gradient(rgba(110,149,104,0.3),rgba(110,149,104,0.3)), url(<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'post-feature-small' );?>) center center; background-size:cover;" class="slider-size">
    <div class="container">
    </div>
</div>
<div class="container content">
<?php if ( is_active_sidebar( 'single_post_right' ) ) : ?>
    <div class="row">
        <div class="col-sm-9 light">
<?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <p class="lead"><?php echo get_the_subtitle(); ?></p>

            <?php if (function_exists('synved_social_share_markup')) echo synved_social_share_markup(); ?>
            <p class="blog-pane-data-container">
                <?php the_content(); ?>
            </p>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php if ( is_active_sidebar( 'single_post_right' ) ) : ?>
                </div>
                <div class="col-sm-3 single_post_sidebar light ">
                    <?php get_sidebar('single_post_right') ?>
                </div>
            </div>

<?php else: ?>
            post_right does not exist
<?php endif; ?>


    </div>


<script src="http://www.moneyiq.jp/js/main.js"></script>
<script></script>
<?php get_footer(); ?>
