<?php 
function add_fullwidth_footer() {
    $args = array(
        'name'          => 'Full Width Footer',
        'id'            => 'fullwidth-footer',
        'description'   => 'The footer sidebar that takes up the full width of the page.');
    register_sidebar($args);
}
function add_custom_post_types() {
    register_post_type('filing', array(
        'label' => 'Filings',
        'labels' => array('name' => 'Filings', 'singular_name' => 'Filing'),
        'description' => 'Filings and publications',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('news_item', array(
        'label' => 'News Items',
        'labels' => array('name' => 'News Items', 'singular_name' => 'News Item'),
        'description' => 'Occurences of the Clinic in the news',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('upcoming_event', array(
        'label' => 'Upcoming Events',
        'labels' => array('name' => 'Upcoming Events', 'singular_name' => 'Upcoming Event'),
        'description' => 'Events that are up and coming',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('past_event', array(
        'label' => 'Past Events',
        'labels' => array('name' => 'Past Events', 'singular_name' => 'Past Event'),
        'description' => 'Events that are no longer in the future due to the passage of time',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('staff_member', array(
        'label' => 'Staff Members',
        'labels' => array('name' => 'Staff Members', 'singular_name' => 'Staff Member'),
        'description' => 'Members of the Cyberlaw Clinic staff',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));
}
function custom_post_shortcode($atts) {
	extract( shortcode_atts( array(
        'type' => null,
		'id' => null,
		'count' => 'all',
        'order' => 'ASC',
        'orderby' => 'menu_order'
	), $atts ) );
    $args = array();

    if (empty($type) && empty($id)) {
        return '';
    }

    if ($count == 'all') {
        $count = -1;
    }

    $contents = array();
    if (!empty($id)) {
        $args = array('p' => $id, 'post_type' => 'any');
    }
    else {
        $args = array(
          'post_type' => $type,
          'post_status' => 'publish',
          'posts_per_page' => $count,
          'order' => $order,
          'orderby' => $orderby
        );
    }
    $my_query = new WP_Query($args);
    if ( $my_query->have_posts() ) { 
       while ( $my_query->have_posts() ) { 
           $my_query->the_post();
           $contents[] = get_the_content();
       }
    }
    $html = implode('<hr />', $contents);
    wp_reset_postdata();

	return $html;
}
wp_enqueue_script('jquery', 'jquery');
wp_enqueue_script('jquerycycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js');
wp_enqueue_script('cyberlaw.js', get_bloginfo('stylesheet_directory') . '/cyberlaw.js');
add_action('init', 'add_fullwidth_footer');
add_action('init', 'add_custom_post_types');
add_shortcode( 'custom-post', 'custom_post_shortcode' );
?>
