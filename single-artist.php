<?php get_header(); ?>
<div class="backgroundtile" style="background-image: url('<?php the_post_thumbnail_url(); ?>;)"></div>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  
    <?php if( have_rows('social_media_links') ): ?>
      <section class="social"aria-label="artists social media links">
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
      </section>
    <?php endif; ?>
    

<main class="artistSingle" >
  <section class="artistSingleMain" aria-label="section about the artist with image and bio including other information">
    <h1 aria-label="Artist's name"><?php the_title(); ?></h1>
    <section class="artistSingleContent">
      <figure aria-label="<?php the_title(); ?>'s image"><?php the_post_thumbnail('full'); ?></figure>
      <?php the_content(); ?>
    </section>
            
  </section>

</main>

      <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>