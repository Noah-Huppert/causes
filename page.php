<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="content">
  <?php
  if(!is_front_page()){
    echo "<span class=\"title\">";
    echo get_the_title();
    echo "</span>";
  }
  ?>

  <div class="body">
    <?php echo get_the_content(); ?>
  </div>
</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer() ?>
