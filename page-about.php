<?php get_header();  ?>
<div class="bg-video-wrap bg-video-about">
    <video src="<?php bloginfo('template_directory'); ?>/images/about1.webm" loop muted autoplay>
</div>
<main class="aboutPage" aria-label="About Xir Residency centere located in Toronto, Canada for artists">
 
 <?php // Start the loop ?>
 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   <?php the_content(); ?>

 <?php endwhile; // end the loop?> 
</main>



<?php get_footer(); ?>