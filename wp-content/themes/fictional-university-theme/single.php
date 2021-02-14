<?php echo 'lol theme charged beachh'; 

/**
 * The WP LOOP
 */
get_header();
while(have_posts()):
     the_post();//gets all the current post info and set the global variables to their value
?>
  <?php  the_title('<h2 style="color:red;">','</h2>');//get the title of the current post info processed by the post function.
  ?>
  <h2><?php   the_content();//get the title of the current post info processed by the post function.
  ?></h2>
 
 <?php endwhile;

get_footer();
?>

