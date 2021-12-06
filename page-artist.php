

<?php get_header();  ?>
<!-- <video crossorigin="anonymous" preload="auto" autoplay="" src="/gcs/national-parks-service/en-us/9f885369-a52a-4a0b-8b2f-f3e5e41cdd54.mp4" style="width: 1090px; height: 613px; position: absolute; top: 0px; left: -228px;"></video> -->
<main class="artistspage">
     <?php $args = array( 'post_type' => 'artist', 'order' => 'DCS', 'posts_per_page' => -1 );
                  query_posts( $args ); // hijack the main loop
                  while ( have_posts() ) : the_post();
    ?>
        <section class="artistEach">
          <a  class="artistPost" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('full'); ?>
          <section class="artistEachInfo">
            <h1><?php the_title(); ?></h1>
            <h2><?php the_field('residence_year'); ?></h2>
          </section>
     
          </a>
        </section>



    <?php endwhile; // end the loop?>

</main>

<?php get_footer(); ?>