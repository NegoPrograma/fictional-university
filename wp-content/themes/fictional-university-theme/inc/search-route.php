<?php

function fetchResults($query){
    $custom_query = new WP_Query(array(
        'post_type' => array('post','page','professor','event','program'),
        's' => sanitize_text_field($query['search'])
    ));

    $data = array(
        'posts'=>array(),
        'pages'=>array(),
        'professors'=>array(),
        'events'=>array(),
        'programs'=>array(),
    );

    while($custom_query->have_posts()){
        $custom_query->the_post();
        $result = array(
            'name' => get_the_title(),
            'link' => get_the_permalink(),
            'id' => get_the_id()
        );
        switch(get_post_type()){
            case('post'):
                $data['posts'][] = $result;
                break;
            case('page'):
                $data['pages'][] = $result;
                break;
            case('professor'):
                $data['professors'][] = $result;
                break;
            case('event'):
                $data['events'][] = $result;
                break;
            case('program'):
                $data['programs'][] = $result;
                break;
        }
    }

    /**
     * Assures professors/programs  and events/programs relationship is taken in account when searching.
     */
    if($data['programs']){
    $programsMetaQuery = array('relation'=> 'OR');

    foreach($data['programs'] as $program){
        $programsMetaQuery[] = array(
            'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' .$program['id']. '"'
        );
    }
    $programRelationshipQuery = new WP_Query(array(
            'post_type' => array('professor','event'),
            'meta_query' => $programsMetaQuery
            ));

        while($programRelationshipQuery->have_posts()){
            $programRelationshipQuery->the_post();
            $data['professors'][] = array(
                'name' => get_the_title(),
                'link' => get_the_permalink(),
                'id' => get_the_id()
            );
        }
    }

    return $data;
}




function add_custom_search_route(){

    register_rest_route('university/v1','search',array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback'=> 'fetchResults'
    ));

}

add_action('rest_api_init','add_custom_search_route');