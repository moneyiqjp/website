<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="blog-pane-title"><?php the_title(); ?></h1>
    <?php if ( has_post_thumbnail() ): // check if the post has a Post Thumbnail assigned to it. ?>
        <img class="img-responsive" src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'post-feature-small' );
        //get_the_post_thumbnail();
        ?>" alt="<?php the_title_attribute() ?>">
    <?php endif; ?>
    <p class="blog-pane-data-container">
        <?php the_content(); ?>
    </p>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
