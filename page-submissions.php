<?php get_header();  ?>

<main class="submissionsPage">
  <?php // Start the loop ?>

    <?php $args = array( 'post_type' => 'af_entry', 
          // 'meta_key'      => 'start_date',
          // 'orderby'      => 'meta_value',
           'order'       => 'DESC',
          // 'orderby' => array(
          //    'meta_value_num' => 'desc',
          //    'post_date' => 'desc'
          'orderby'    => array(
                'start_date' => 'DSC',
                'post_date' => 'desc'
              ),
          'posts_per_page' => -1 );
      query_posts( $args ); // hijack the main loop

      if ( ! have_posts() ) : ?>

  <article id="post-0" class="fullwidthpost" >
    <h2 class="entry-title">No Submissions</h2>
     <section class="excerptPosts fullwidthexcerpts">
      <p>Apologies, but no results were found!</p>
    </section><!-- .entry-content -->
  </article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>
<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" class="fullwidthpost">
      <h2 class="entry-title">
     <!--    <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark"> -->
          <?php the_title(); ?> - <?php the_field('artist_name_pronouns'); ?>

          
        <!-- </a> -->
      </h2>
      <section class="email">
        <?php the_field('email_address'); ?>
      </section>
      <section class="question">
        <p class='questionHead'>Where do you live?</p>
        <?php the_field('artist_location'); ?>
      </section>
      <section class="question">
        <p class='questionHead'>Tell us about yourself (maximum 300 words).</p>
        <?php the_field('artist_bio'); ?>
      </section>
      <section class="question">
        <p class='questionHead'>Tell us about your art practice (maximum 300 words). </p>
        <?php the_field('artist_art_practice'); ?>
      </section>
        <section class="question">
        <p class='questionHead'>How would you spend your time at the residency? Will you be creating a specific project, or using the time to do exploratory/experimental work? (maximum 500 words)</p>
        <?php the_field('artist_residency_use'); ?>
      </section>
        <section class="question">
        <p class='questionHead'>This residency is designed to increase accessibility and visibility for practitioners who have been structurally marginalized. How do you think XiR can assist you in this sense? (maximum 500 words)</p>
        <?php the_field('artist_accessibility'); ?>
      </section>
        <section class="question">
        <p class='questionHead'>Please provide a link to your website (if applicable)</p>
        <a href=" <?php the_field('artist_website'); ?>"> <?php the_field('artist_website'); ?></a>
      </section>
        <section class="question">
        <p class='questionHead'>Which residency semester are you interested in? (select both if you don't have a preference)</p>
        <?php the_field('artist_semester'); ?>
      </section>
      <section class="uploadFile">
      <p class='questionHead'>In a single PDF please attach up to 10 samples of your work (if applicable)</p>
      <?php
      $file = get_field('artist_artwork');
      if( $file ): ?>
          <a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
      <?php endif; ?>
      <?php the_field(''); ?>
    </section>
     <section class="uploadFile">
      <p class='questionHead'>Please attach your CV (if applicable)</p>
      <?php
      $file = get_field('artist_cv');
      if( $file ): ?>
        <a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
      <?php endif; ?>
     <?php the_field(''); ?>
    </section>
      <section class="question">
      <p class='questionHead'>Do you have any specific accessibility requirements?</p>
       <?php the_field('artist_accessibility'); ?>
    </section>
    <section class="question">
      <p class='questionHead'>Do you have any questions for us?</p>
       <?php the_field('artist_questions'); ?>
    </section>

    </article><!-- #post-## -->


<?php endwhile; // End the loop. Whew. ?>
   <?php wp_reset_query();?> 
</main>



<?php get_footer(); ?>