<?php get_header();  ?>
<div class="bg-video-wrap bg-video-about">
    <video src="<?php bloginfo('template_directory'); ?>/images/about1.mp4" loop muted autoplay>
</div>
<main>
 
 <?php // Start the loop ?>
 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   <h2><?php the_title(); ?></h2>
   <?php the_content(); ?>

 <?php endwhile; // end the loop?> 
</main>



<?php get_footer(); ?>