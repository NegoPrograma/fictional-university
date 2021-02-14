<?php get_header(); ?>


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

    <?php

    /**
     * only about-us sub-pages should have this go back button
     */

    $parent_page_id = wp_get_post_parent_id(get_the_id());
    if ($parent_page_id) {
        $return_url = get_permalink($parent_page_id);//site_url('/about-us');
        $title = get_the_title();
        $parent_title = get_the_title($parent_page_id);
        $back_to_about_us_html = "<div class='metabox metabox--position-up metabox--with-home-link'>
    <p><a class='metabox__blog-home-link' href='$return_url'><i class='fa fa-home' aria-hidden='true'></i>Back to $parent_title</a>
    <span class='metabox__main'>". $title. "</span></p></div>";
        echo $back_to_about_us_html;
    };



    ?>

<?php $children = get_children(get_the_id());
          if(count($children) > 0):
          ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php get_permalink()?>"><?php echo get_the_title();?></a></h2>
      <ul class="min-list">
          <?php 
            foreach($children as $child):
          ?>
        <li class="current_page_item"><a href="<?php echo site_url($child->post_name)?>"><?php echo get_the_title($child->ID);?></a></li>
        <?php endforeach;?>
      </ul>
    </div>
    
    <div class="generic-content">
        <? the_content();?>
    </div>
    <?php endif;?>

</div>


<?php


wp_footer();
get_footer(); ?>