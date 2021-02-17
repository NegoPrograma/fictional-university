<?php

 /**
  * Add custom type named professors
  */

  function add_professors_post_type(){
      register_post_type('professor', array(
        'supports' => array('title','editor','thumbnail'), 
        'rewrite' => array('slug' => 'professors'),
        'public' => true, 
        'has_archive' => true,
        'labels' => array(
            'name' => 'Professors',
            'add_new_item' => 'Add New Professor',
            'edit_item' => 'Edit Professor',
            'all_items' => 'All Professors',
            'singular_name' => 'Professor'
        ),
        'menu_icon' => 'dashicons-welcome-learn-more'
      ));
  }
  add_action('init', 'add_professors_post_type'); 
  
  ?>