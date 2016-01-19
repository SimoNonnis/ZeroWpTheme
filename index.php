<?php get_header(); ?>


  <?php //simple loop with excerpt and content ?>
  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php echo get_excerpt(14); ?>

      <?php the_content(); ?>

    <?php endwhile; ?>

  <?php endif; ?>



<?php get_footer(); ?>