<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div style="background: linear-gradient(rgba(110,149,104,0),rgba(110,149,104,0)), url(<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' );?>) center center; background-size:cover;" class="slider-size">
    <!-- <div class="container slider-size"> -->
        <?php
            $credit = get_media_credit_html( get_post_thumbnail_id( $post ) );
            if(strpos($credit, '| MoneyIQ') == false):
        ?>
        <div class="bottom-right credit-box">
            <?php echo $credit  ?>
        </div>
        <?php endif; ?>
    <!-- </div>-->
</div>
<div class="container content">
<?php if ( is_active_sidebar( 'single_post_right' ) ) : ?>
    <div class="row">
        <div class="col-sm-9 light single_post_content">
<?php endif; ?>
            <h1><?php the_title(); ?></h1>

            <?php if(strlen(get_the_subtitle()>0)): ?>
                <p class="subtitle"><?php echo get_the_subtitle(); ?></p>
            <?php endif;?>

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

    <?php if ( is_user_logged_in() ) : ?>
        <?php edit_post_link('edit', '<div class="row light">', '</div>'); ?>
    <?php endif; ?>
<?php else: ?>

<?php endif; ?>


    </div>


    <!-- <script src="http://www.moneyiq.jp/js/main.js"></script> -->
    <script>
    jQuery(document).ready(function(){
        jQuery("div.kb-merit ul").addClass("fa-ul");
        jQuery("div.kb-merit li").prepend("<i class='fa-li fa fa-check-square'></i>");
        jQuery("div.kb-demerit ul").addClass("fa-ul");
        jQuery("div.kb-demerit li").prepend("<i class='fa-li fa fa-times-circle'></i>");
        jQuery("div.kb-general ul").addClass("fa-ul");
        jQuery("div.kb-general li").prepend("<i class='fa-li fa fa-bullseye'></i>");
    });
    </script>
<?php get_footer(); ?>
