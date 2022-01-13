<?php get_header(); ?>

<main>
  <h1>Tag Archives: <?php single_tag_title(); ?></h1>
  <?php get_template_part( 'loop', 'tag' ); ?>
</main>

<?php get_footer(); ?>