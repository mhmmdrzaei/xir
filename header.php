<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<header>

   <?php wp_nav_menu( array(
      'container' => false,
      'theme_location' => 'primary'
    )); ?>

     <?php $args = array( 'post_type' => 'artist', 'order' => 'DCS', 'posts_per_page' => 1, 'category_name' => 'inresidence' );
                  query_posts( $args ); // hijack the main loop
                  while ( have_posts() ) : the_post();
    ?>
        <section class="xclickArtist">

          <a  class="artistPost" href="<?php the_permalink(); ?>">
          <div class="artistImageFramed">
          <?php the_post_thumbnail('full'); ?>
          <img class="image2" src="<?php bloginfo('template_directory'); ?>/images/xframe.png" alt="">
          <h2>><?php the_title(); ?> <br> in residence</h2>
          <svg viewBox="0 0 425">
            <path id="curve" d="M6,150C49.65,93,105.79,36.65,156.2,47.55,207.89,58.74,213,131.91,264,150c40.67" />
              <text x="25">
                <textPath xlink:href="#curve">
                Learn More
               </textPath>
               </text>
          </svg>
          </div>

          </a>
        </section>



    <?php endwhile; // end the loop?>

    <?php wp_reset_query(); ?> 
</header><!--/.header-->

