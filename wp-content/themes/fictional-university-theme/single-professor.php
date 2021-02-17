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
            <p><?echo get_field('subtitle');?></p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">


 <div class="generic-content">
 <div class="row group">
 <div class="one-third"><?php the_post_thumbnail('professorLandscape');?></div>
 <div class="two-thirds"><?the_content();?></div>
 </div>
 </div>
 <?php endwhile;?>

 <?php $programs = get_field('related_programs');
if( is_array($programs) || $programs->ID != null) : ?>
  <h3>Subject(s) Taught:</h3>
<ul>
<?php

foreach($programs as $program) :
?>
<li><a href="<?php echo $program->guid?>"><?php echo $program->post_title;?></a></li>

<?php endforeach;?>
</ul>
<?php endif;?>
 </div>
 

<?php
get_footer();
?>
