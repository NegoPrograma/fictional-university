<?php

/**
 * Action to include css files.
 */

function css_resources(){
    wp_enqueue_style('font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('roboto_font','https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('main_css',get_stylesheet());
}
 add_action('wp_enqueue_scripts','css_resources');

/**
 * Action to include js files.
 */

 function js_resources(){
     wp_enqueue_script('carrosel', "http://localhost:3000/bundled.js", NULL, '1.0', true);
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




 /**
  * Apply date filter on ACF event_date
  */


  function convert_timestamp_to_date($timestamp,$format){

    $date= new DateTime($timestamp);
    return $date->format($format);
  }

  add_filter('convert_timestamp_to_date','convert_timestamp_to_date',10,2);

 
/**
 * 
 *Edit event type archive query
 *  
*/
function events_custom_query($wp_query){
    //the pre get posts action is triggered whenever wp makes queries and that include the wp-admin menus! 
    //so, if you truly need to trigger this action to use a custom query, do not forget to filter your targets!
    if(!is_admin() && is_post_type_archive() && $wp_query->is_main_query()){
        $wp_query->set('meta_key','event_date');
        $wp_query->set('posts_per_page',3);
        $wp_query->set('orderby','meta_value_num');
        $wp_query->set('order','ASC');
        $wp_query->set('meta_query',array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => date('Ymd')//today's date.
        ));
    }

}
add_action('pre_get_posts','events_custom_query');