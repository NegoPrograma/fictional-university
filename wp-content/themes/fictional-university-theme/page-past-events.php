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


      ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php echo get_the_permalink();?>">
            <span class="event-summary__month"><?php echo apply_filters('convert_timestamp_to_date',get_field('event_date'),'M');            ?></span>
            <span class="event-summary__day"><?php echo apply_filters('convert_timestamp_to_date',get_field('event_date'),'d');;?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h5>
            <p><?php echo wp_trim_words(get_the_content(), 18);?> <a href="<?php echo get_the_permalink();?>" class="nu gray">Learn more</a></p>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata();
      
      echo paginate_links(array(
          'total' => $eventsQuery->max_num_pages
      ));?>
</div>
<?php

get_footer();
?>