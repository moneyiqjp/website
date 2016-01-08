<?php get_header(); ?>
    <?php $counter=0; if ( have_posts() ) : while ( have_posts() ) : the_post(); $counter++;?>
    <?php if (($counter%3)==1) echo "<div class='row'>"; ?>
    <div class="col-sm-4">
        <h3><?php the_title(); ?></h3>
        <p><?php the_excerpt(); ?></p>
    </div>
    <?php if (($counter%3)==0) echo "</div>"; ?>
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php get_footer(); ?>