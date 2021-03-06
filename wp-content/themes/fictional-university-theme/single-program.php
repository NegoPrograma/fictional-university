<?php
/**
 * The WP LOOP
 */
get_header();
while(have_posts()):
     the_post();
?>
 

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("images/ocean.jpg"); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo the_title() ?></h1>
        <div class="page-banner__intro">
            <p>TO REPLACE.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
<div class='metabox metabox--position-up metabox--with-home-link'>
    <p><a class='metabox__blog-home-link' href='<?php echo  get_post_type_archive_link('program');?>'><i class='fa fa-home' aria-hidden='true'></i>All Programs</a>
    <span class='metabox__main'><?php the_title();?></span></p></div>

 <div class="generic-content"><?php the_content()?></div>

 <h2>Professors on this subject:</h2>
 <?php
      $today = date('Ymd');
      $relatedProfessors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
          array(
              'key' => 'related_programs',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"' ,//get the ID of the current page, not the id of the query.
          )
        )
      ));

      while ($relatedProfessors->have_posts()) :
        $relatedProfessors->the_post();

      ?>
       <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
      <?php endwhile; wp_reset_postdata();?>

<hr>
      <h3>Upcoming Events</h3>
 <?php
      $today = date('Ymd');
      $eventsQuery = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'event',
        'orderby' => 'meta_value_num',
        'meta_key' => 'event_date',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          ),
          array(
              'key' => 'related_programs',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"' ,//get the ID of the current page, not the id of the query.
          )
        )
      ));

      while ($eventsQuery->have_posts()) :
        $eventsQuery->the_post();

        get_template_part('template-parts/content',get_post_type()); endwhile; wp_reset_postdata();?>

 </div>
 <?php endwhile;

get_footer();
?>

