<?php get_header(); ?>
    <div id="main-container">
        <div id="main-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="blog-pane">
                    <?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?>
                        <div class="blog-pane-feature-image">
                            <?php the_post_thumbnail('post-feature-small'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="blog-pane-title"><?php the_title(); ?></div>
                    <div class="blog-pane-data-container">
                        <?php the_content(); ?>
                    </div>
                    <!--
                    <div class="blog-pane-read-more"></div>
                    -->
                    <br>
                    <hr>
                    <?php
                    echo get_the_tag_list('<p class="blog-pane-tags">',', ','</p>');
                    ?>
                    <a href ="index.php" class="blog-pane-back-link">
                        <img src="<?php bloginfo('template_directory'); ?>/img/single-page-back.png" width="40" height="40">
                        ブログのホームページに戻る
                    </a>
                    <br>
                    <br>
                </div>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <?php get_sidebar('home_right_1') ?>
<?php endif; ?>
<?php get_footer(); ?>