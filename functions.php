<?php 
function add_fullwidth_footer() {
    $args = array(
        'name'          => 'Full Width Footer',
        'id'            => 'fullwidth-footer',
        'description'   => 'The footer sidebar that takes up the full width of the page.');
    register_sidebar($args);
}
function add_custom_post_types() {

    register_post_type('filings', array(
        'label' => 'Filings',
        'labels' => array('name' => 'Filings', 'singular_name' => 'Filing'),
        'description' => 'Filings and publications',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('news_items', array(
        'label' => 'News Items',
        'labels' => array('name' => 'News Items', 'singular_name' => 'News Item'),
        'description' => 'Occurences of the Clinic in the news',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('upcoming_events', array(
        'label' => 'Upcoming Events',
        'labels' => array('name' => 'Upcoming Events', 'singular_name' => 'Upcoming Event'),
        'description' => 'Events that are up and coming',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('past_events', array(
        'label' => 'Past Events',
        'labels' => array('name' => 'Past Events', 'singular_name' => 'Past Event'),
        'description' => 'Events that are no longer in the future due to the passage of time',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('staff_members', array(
        'label' => 'Staff Members',
        'labels' => array('name' => 'Staff Members', 'singular_name' => 'Staff Member'),
        'description' => 'Members of the Cyberlaw Clinic staff',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));
}
wp_enqueue_script('jquery', 'jquery');
wp_enqueue_script('jquerycycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js');
wp_enqueue_script('cyberlaw.js', get_bloginfo('stylesheet_directory') . '/cyberlaw.js');
add_action('init', 'add_fullwidth_footer');
add_action('init', 'add_custom_post_types');
?>
