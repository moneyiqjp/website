<?php get_header();?>
<div id="moneyiq-index-carousel" class="carousel slide" data-ride="carousel"  data-interval="6000" data-pause="none">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
        $lastposts = get_transient('moneyiq_advertising');
        if(!$lastposts) {
            $lastposts = get_posts(array('posts_per_page' => 5, 'category' => 15));
            set_transient('moneyiq_advertising', $lastposts, 60*60*12);
        }
        $args = array( 'posts_per_page' => 5, 'category' => 7 );
        $lastposts = array_merge(get_posts( $args ), $lastposts );
        $count = -1;
        foreach ( $lastposts as $post ):  $count++;
    ?>
        <li data-target="#moneyiq-index-carousel" data-slide-to="<?php echo $count;?> "
                                        class="hidden-xs <?php if($count==0) { echo "active";} ?>">
            <i class="fa fa-dot-circle-o"></i>
            <?php //the_title(); ?>
        </li>
    <?php endforeach; ?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
<?php
    /*
    $args = array( 'posts_per_page' => 5 );
    $lastposts = get_posts( $args );
    */
    $start = true;
    foreach ( $lastposts as $post ) :  setup_postdata( $post );
            $link = in_category( 15, $_post )? "http://www.moneyiq.jp": get_permalink();
            $title=get_the_title();
            $subtitle=get_the_subtitle();
            if(strlen($subtitle)<=0) {$subtitle=$title;}

?>
        <div class="item <?php if($start) {echo "active"; $start=false;} ?>">
            <div style="background: linear-gradient(rgba(110,149,104,0),rgba(110,149,104,0)), url(<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' );?>) center center; background-size:cover;" class="slider-size">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-8  slider-size">

                        </div>
                        <div class="col-sm-4 bg_moneyiq_green  slider-size kb-carousel-text">
                            <a href='<?php echo $link; ?>'>
                                <h2 class="kb-title"><?php echo $subtitle;?></h2>
                                <p class="lead hidden-xs"><?php echo get_the_excerpt(); ?></p>
                            </a>
                            <div class="kb-orange-bg kb-button kb-carousel-button">
                                <a href="<?php echo $link; ?>" class="kb-link">
                                    記事を読む
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kb-title-row kb-title">
                    <a href='<?php echo $link; ?>'>
                        <?php  echo $title?>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; wp_reset_postdata(); ?>
    </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#moneyiq-index-carousel" data-slide="prev">&lsaquo;</a>
  <a class="right carousel-control" href="#moneyiq-index-carousel" data-slide="next">&rsaquo;</a>
</div> <!-- Carousel -->


<div class="container light">
    <div class='row'>
    <?php
        query_posts( "cat=-15" );
        $counter=0; if ( have_posts() ) : while ( have_posts() ) : the_post();
        $counter++;
        $tempo = $wp_query->post_count%3==0?3:$wp_query->post_count%3;
        $split=($wp_query->post_count+(3-$tempo))/3;
        $fulltitle = get_the_title();
        //if( function_exists('get_the_subtitle') ) $fulltitle .= get_the_subtitle();

        ?>

        <?php if ($counter%$split==1) echo "<div class=\"col-sm-4\">"; ?>
        <div class="post-thumbnail">
            <?php if ( has_post_thumbnail() ) : ?>
                <a href='<?php echo get_permalink() ?>'>
                    <img class="img-responsive" src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'post-preview' );
                    //get_the_post_thumbnail();
                    ?>" alt="<?php the_title_attribute() ?>">
                </a>
            <?php endif; ?>
            <div class="col">
                <a href='<?php echo get_permalink() ?>'>
                    <h3><?php echo $fulltitle; ?></h3>
                </a>
            </div>
        </div>

        <p class="postexcerpt">
            <?php echo get_the_excerpt();/*the_excerpt();*/ ?>
        </p>

        <?php if ($counter%$split==0||$counter==$wp_query->post_count) :?>
        </div>
        <?php else: ?>
        <hr>
        <?php endif; ?>

    <?php endwhile; else: ?>
        <p><?php echo('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>


<?php get_footer(); ?>
