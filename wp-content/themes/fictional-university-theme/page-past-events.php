<?php

/**
 * Custom archive front end based on event custom post type
 */
get_header();
?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("images/ocean.jpg"); ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Past Events</h1>
    <div class="page-banner__intro">
      <p>Recap events.</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">

<?php
       $today = date('Ymd');
       $eventsQuery = new WP_Query(array(
         'paged' => get_query_var('paged',1),
         'post_type' => 'event',
         'orderby' => 'meta_value_num',
         'meta_key' => 'event_date',
         'order' => 'ASC',
         'meta_query' => array(
           array(
             'key' => 'event_date',
             'compare' => '<',
             'value' => $today,
             'type' => 'numeric'
           )
         )
       ));
 
       while ($eventsQuery->have_posts()) :
         $eventsQuery->the_post();

         get_template_part('template-parts/content',get_post_type()); endwhile; wp_reset_postdata();
      
      echo paginate_links(array(
          'total' => $eventsQuery->max_num_pages
      ));?>
</div>
<?php

get_footer();
?>