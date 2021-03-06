<?php

/**
 * Custom archive front end based on event custom post type
 */
get_header();
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("images/ocean.jpg"); ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All Events</h1>
    <div class="page-banner__intro">
      <p>Check our events!!</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">

<?php
     
      while (have_posts()) :
        the_post();

        get_template_part('template-parts/content',get_post_type()); endwhile;
       wp_reset_postdata();
       echo paginate_links();
       ?>

       <p> <a href="<?php echo site_url('/past-events');?>"> Check the past events!</a></p>
</div>
<?php

get_footer();
?>