<?php 
function add_fullwidth_footer() {
    $args = array(
        'name'          => 'Full Width Footer',
        'id'            => 'fullwidth-footer',
        'description'   => 'The footer sidebar that takes up the full width of the page.');
    register_sidebar($args);
}
function add_custom_post_types() {

    register_post_type('amicus_brief', array(
        'label' => 'Amicus Briefs',
        'labels' => array('name' => 'Amicus Briefs', 'singular_name' => 'Amicus Brief'),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('publication', array(
        'label' => 'Publications',
        'labels' => array('name' => 'Publications', 'singular_name' => 'Publication'),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('filing', array(
        'label' => 'Filings',
        'labels' => array('name' => 'Filings', 'singular_name' => 'Filing'),
        'description' => 'Filings and publications',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes')
    ));

    register_post_type('press_release', array(
        'label' => 'Press Releases',
        'labels' => array('name' => 'Press Releases', 'singular_name' => 'Press Release'),
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

    register_post_type('event', array(
        'label' => 'Events',
        'labels' => array('name' => 'Events', 'singular_name' => 'Event'),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('project', array(
        'label' => 'Project',
        'labels' => array('name' => 'Projects', 'singular_name' => 'Project'),
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
    $event_type = null;

    if (empty($type) && empty($id)) {
        return '';
    }

    if ($count == 'all') {
        $count = -1;
    }

    if ($type == 'upcoming_event' || $type == 'past_event') {
        $event_type = $type;
        $type = 'event';
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

           // Handle event dates so we don't need both upcoming and past event custom post types
           $event_date = get_post_meta(get_the_ID(), 'event_date', true);
           if (!is_null($event_type) && !empty($event_date)) {
               if ($event_type == 'upcoming_event' && strtotime($event_date) > $_SERVER['REQUEST_TIME']) {
                   $contents[] = get_the_content();
               }
               if ($event_type == 'past_event' && strtotime($event_date) < $_SERVER['REQUEST_TIME']) {
                   $contents[] = get_the_content();
               }
           }
           else { 
               $contents[] = get_the_content();
           }
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
