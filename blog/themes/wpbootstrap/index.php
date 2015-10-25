<?php get_header(); ?>
<div id="main-container">
    <div id="main-content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="blog-pane-preview">
        <?php
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        }
        ?>
        <div class="blog-pane-title"><?php the_title(); ?></div>
        <div class="blog-data-container">
            <?php //the_content();
            the_excerpt();
            ?>
        </div>
        <div class="blog-read-more">
            <a href="<?php echo get_permalink(); ?>"> Read More</a>
        </div>
    </div>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
    </div>
</div>
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
        <div class="moneybutton">
            <a href="http://www.moneyiq.jp/v2/index.html">
                <div class="mb-image"><img src="<?php bloginfo('template_directory'); ?>/img/squirrel.png"></div>
                <div class="mb-text">MoneyIQに<br>アクセス</div>
            </a>
        </div>
	</div><!-- #primary-sidebar -->
<?php endif; ?>
<?php get_footer(); ?>