<?php get_header(); ?>
<div class='row'>
<?php $counter=0; if ( have_posts() ) : while ( have_posts() ) : the_post();
    $counter++;
    $tempo = $wp_query->post_count%3==0?3:$wp_query->post_count%3;
    $split=($wp_query->post_count+(3-$tempo))/3;
    ?>

    <?php if ($counter%$split==1) echo "<div class=\"col-sm-4\">"; ?>
    <div class="post-thumbnail">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href='<?php echo get_permalink() ?>'>
                <img class="img-responsive" src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'post-feature-small' );
                //get_the_post_thumbnail();
                ?>" alt="<?php the_title_attribute() ?>">
            </a>
        <?php endif; ?>
        <div class="col">
            <a href='<?php echo get_permalink() ?>'>
                <h3><?php the_title(); ?></h3>
            </a>
        </div>
    </div>

    <p class="postexcerpt">
        <?php echo get_the_excerpt(2);/*the_excerpt();*/ ?>
    </p>

    <?php if ($counter%$split==0||$counter==$wp_query->post_count) :?>
    </div>
    <?php else: ?>
    <hr>
    <?php endif; ?>

<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>


<?php get_footer(); ?>