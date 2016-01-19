<?php 

/*
This page is actually going to display the default blog section - (the real static home page is front-page.php)
WordPress will only use either home.php or index.php, but I prefear home.php
(even if could be misleading) because I want to leave index.php to display 
"Work In Progress" message to all pages that don't have a template page assigned!

Use only the home.php template file for the blog posts index. 
Do not use a Custom Page Template (such as template-blog.php) for two reasons:

When the static front page feature is configured properly, 
WordPress will not use a Custom Page Template to display the blog 
posts index, even if a Custom Page Template is assigned to the page 
designated as the "Posts page". 

WordPress will only use either home.php or index.php.
When the Custom Page Template is assigned to a static page other than 
the one designated as the "Posts page," the blog posts index loop pagination will not work properly.

*/

get_header(); ?> 


<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <!-- List Blog Posts -->
  <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
  <p></p><?php echo get_excerpt(300); ?>

<?php endwhile; else: ?>

  <p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->







  


<?php get_footer(); ?>
