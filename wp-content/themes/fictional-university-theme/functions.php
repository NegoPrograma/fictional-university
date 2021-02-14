<?php

/**
 * Action to include css files.
 */

function css_resources(){
    wp_enqueue_style('font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('roboto_font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('main_style',get_stylesheet_uri());
}
 add_action('wp_enqueue_scripts','css_resources');

/**
 * Action to include js files.
 */

 function js_resources(){
     wp_enqueue_script('carrosel', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
 }

 
add_action('wp_enqueue_scripts','js_resources');

/**
 * Action to add some optional wp features like automatic title processing.
 */
function university_theme_support(){
    add_theme_support('title-tag');
}

 add_action('after_setup_theme','university_theme_support');

 /**
  * Action to add theme-exclusive menu options on wp-admin/appearance/menus
  */

function university_theme_menu_features(){
    register_nav_menu('header_link_options','Top Nav Menu ');
    register_nav_menu('explore_footer_menu','Explore Footer ');
    register_nav_menu('learn_footer_menu','Learn Footer ');
}
  
 add_action('after_setup_theme','university_theme_menu_features');
