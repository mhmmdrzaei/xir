<?php get_header(); ?>
<div class="backgroundtile" style="background-image: url('<?php the_post_thumbnail_url(); ?>;)"></div>
<main class="artistSingle">
   <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <section class="social">
    <?php if( have_rows('social_media_links') ): ?>
        <?php while( have_rows('social_media_links') ): the_row();?>
            <a href="<?php the_sub_field('social_link') ?>">

              <?php 
              $value = get_sub_field('social_platform'); 

              if( $value == "Instagram" ) { ;?>
               <i class="fab fa-instagram"></i>
             <?php } elseif($value == "Facebook") {;?>
                 <i class="fab fa-facebook-f"></i>
              <?php } elseif($value == "LinkedIn") {;?>
                <i class="fab fa-linkedin-in"></i>
              <?php } elseif($value == "Twitter") {;?>
                <i class="fab fa-twitter"></i>
              <?php } elseif($value == "Tik Tok") {;?>
                <i class="fab fa-tiktok"></i>
               <?php };?>
              </a> 
        <?php endwhile; ?>
    <?php endif; ?>
    
  </section>
  <section class="artistSingleMain">
    <h1><?php the_title(); ?></h1>
    <figure><?php the_post_thumbnail('full'); ?></figure>
    <section class="artistSingleContent">
      <?php the_content(); ?>
    </section>
            
  </section>

</main>

      <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>