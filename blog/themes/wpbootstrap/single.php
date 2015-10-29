<?php get_header(); ?>
<div id="main-container">
    <div id="main-content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="blog-pane">
        <?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?>
            <div class="blog-pane-feature-image">
                <?php the_post_thumbnail('post-feature'); ?>
            </div>
        <?php endif; ?>
        <div class="blog-pane-category-links">
            <a href="<?php echo get_day_link('', '', ''); ?>">
                <?php echo the_date('Y-m-d', '', ''); ?>
            </a> /
            <?php
                $categories = get_the_category();
                $separator = ' ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                    }
                    echo trim( $output, $separator );
                }
            ?> </div>
        <div class="blog-pane-title"><?php the_title(); ?></div>
        <div class="blog-pane-data-container">
            <?php the_content(); ?>
        </div>
        <div class="blog-pane-read-more">

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
                <div class="mb-image"><img src="<?php bloginfo('template_directory'); ?>/img/squirrel_40.png"></div>
                <div class="mb-text">MoneyIQに アクセス</div>
            </a>
        </div>
	</div><!-- #primary-sidebar -->
<?php endif; ?>
<?php get_footer(); ?>