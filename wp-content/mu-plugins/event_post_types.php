<?php

 /**
  * Add custom type named events
  */

  function add_events_post_type(){
      register_post_type('event', array(
        'supports' => array('title','editor'), //supports is a list of what you may edit on this custom post editor screen.
        'rewrite' => array('slug' => 'events'),//rewrite the archive url to events.
        'public' => true, 
        'has_archive' => true,//let wordpress query based on post type on /event subpage
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'
      ));
  }
  add_action('init', 'add_events_post_type'); 
  
  ?>