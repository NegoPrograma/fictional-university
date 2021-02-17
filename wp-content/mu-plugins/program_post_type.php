<?php

 /**
  * Add custom type named program
  */

  function add_program_post_type(){
      register_post_type('program', array(
        'supports' => array('title','editor'), //supports is a list of what you may edit on this custom post editor screen.
        'rewrite' => array('slug' => 'programs'),//rewrite the archive url to program.
        'public' => true, 
        'has_archive' => true,//let wordpress query based on post type on /event subpage
        'labels' => array(
            'name' => 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All program',
            'singular_name' => 'Program'
        ),
        'menu_icon' => 'dashicons-awards'
      ));
  }
  add_action('init', 'add_program_post_type'); 
  
  ?>