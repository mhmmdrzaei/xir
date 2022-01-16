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
  <section class="mobileSVG" aria-label="Mobile navigation button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1684.73 470.43"><path d="M1122.4,72.5a178.7,178.7,0,0,1,36,3.6,222.72,222.72,0,0,0-296.3,15,222.72,222.72,0,0,0-296.3-15,177.25,177.25,0,0,1,36-3.6c98.3,0,178.1,79.7,178.1,178s-79.7,178-178.1,178a176,176,0,0,1-32.7-3,222.71,222.71,0,0,0,293-17.6,222.71,222.71,0,0,0,293,17.6,176,176,0,0,1-32.7,3c-98.3,0-178.1-79.7-178.1-178S1024.1,72.5,1122.4,72.5Z" transform="translate(-20.1 -12)"/><path d="M271.3,122c-9.2-13.4-18.2-28.2-27.6-45-9.4,16.8-18.5,31.7-27.6,45-52.8-9.5-110-46.2-196-110,63.8,86.1,100.5,143.2,110,196-13.4,9.2-28.2,18.2-45,27.6,16.8,9.4,31.7,18.5,45,27.6-9.5,52.8-46.2,110-110,196,86.1-63.8,143.2-100.5,196-110,9.2,13.4,18.2,28.2,27.6,45.1,9.4-16.8,18.5-31.7,27.6-45,52.8,9.5,110,46.2,196.1,110-63.8-86.1-100.4-143.2-110-196,13.4-9.2,28.2-18.2,45.1-27.6-16.8-9.4-31.7-18.5-45.1-27.6,9.6-52.8,46.2-110,110-196C381.3,75.8,324.1,112.5,271.3,122ZM243.7,324.4a88.7,88.7,0,1,1,88.7-88.7A88.68,88.68,0,0,1,243.7,324.4Z" transform="translate(-20.1 -12)"/><circle cx="223.6" cy="223.7" r="65.7"/><path d="M1560,261.8c269.5-190.7,114.9-345.2-75.8-75.8C1293.5-83.5,1139,71.1,1408.4,261.8c-269.5,190.7-114.9,345.2,75.8,75.8C1674.9,607.1,1829.5,452.5,1560,261.8Zm-75.8,49.7a49.6,49.6,0,1,1,49.6-49.6A49.59,49.59,0,0,1,1484.2,311.5Z" transform="translate(-20.1 -12)"/></svg>
  </section>
   <?php wp_nav_menu( array(
      'container' => false,
      'theme_location' => 'primary'
    )); ?>

     <?php $args = array( 'post_type' => 'artist', 'order' => 'DCS', 'posts_per_page' => 1, 'category_name' => 'inresidence' );
                  query_posts( $args ); // hijack the main loop
                  while ( have_posts() ) : the_post();
    ?>
        <section class="xclickArtist" aria-label="X is the current artist in residence">

          <a  class="artistPost" href="<?php the_permalink(); ?>">
          <div class="artistImageFramed" aria-label="picture of the current artist in residence">
          <?php the_post_thumbnail('full'); ?>
          <img class="image2" src="<?php bloginfo('template_directory'); ?>/images/xframe.png" alt="">
          <h2><?php the_title(); ?> in residence</h2>
          </div>

          </a>
        </section>



    <?php endwhile; // end the loop?>

    <?php wp_reset_query(); ?> 
</header><!--/.header-->

