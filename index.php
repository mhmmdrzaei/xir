<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<main>
  <?php get_template_part( 'loop', 'index' ); ?>
</main>
    		

<?php get_footer(); ?>