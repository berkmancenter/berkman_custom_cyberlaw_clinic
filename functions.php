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
        'labels' => array(
            'name' => 'Amicus Briefs',
            'singular_name' => 'Amicus Brief',
            'add_new_item' => 'Add New Amicus Brief',
            'edit_item' => 'Edit Amicus Brief',
            'new_item' => 'New Amicus Brief',
            'view_item' => 'View Amicus Brief',
            'search_items' => 'Search Amicus Briefs'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('publication', array(
        'label' => 'Publications',
        'labels' => array(
            'name' => 'Publications',
            'singular_name' => 'Publication',
            'add_new_item' => 'Add New Publication',
            'edit_item' => 'Edit Publication',
            'new_item' => 'New Publication',
            'view_item' => 'View Publication',
            'search_items' => 'Search Publications'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('filing', array(
        'label' => 'Other Filings',
        'labels' => array(
            'name' => 'Other Filings',
            'singular_name' => 'Other Filing',
            'add_new_item' => 'Add New Filing',
            'edit_item' => 'Edit Other Filing',
            'new_item' => 'New Other Filing',
            'view_item' => 'View Other Filing',
            'search_items' => 'Search Other Filings'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('press_release', array(
        'label' => 'Press Releases',
        'labels' => array(
            'name' => 'Press Releases',
            'singular_name' => 'Press Release',
            'add_new_item' => 'Add New Press Release',
            'edit_item' => 'Edit Press Release',
            'new_item' => 'New Press Release',
            'view_item' => 'View Press Release',
            'search_items' => 'Search Press Releases'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('news_item', array(
        'label' => 'News Items',
        'labels' => array(
            'name' => 'News Items',
            'singular_name' => 'News Item',
            'add_new_item' => 'Add New News Item',
            'edit_item' => 'Edit News Item',
            'new_item' => 'New News Item',
            'view_item' => 'View News Item',
            'search_items' => 'Search News Items'
        ),
        'description' => 'Occurences of the Clinic in the news',
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('event', array(
        'label' => 'Events',
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'new_item' => 'New Event',
            'view_item' => 'View Event',
            'search_items' => 'Search Events'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('project', array(
        'label' => 'Project',
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
            'view_item' => 'View Project',
            'search_items' => 'Search Projects'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('bio', array(
        'label' => 'Bio',
        'labels' => array(
            'name' => 'Bios',
            'singular_name' => 'Bio',
            'add_new_item' => 'Add New Bio',
            'edit_item' => 'Edit Bio',
            'new_item' => 'New Bio',
            'view_item' => 'View Bio',
            'search_items' => 'Search Bios'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('client', array(
        'label' => 'Client',
        'labels' => array(
            'name' => 'Clients',
            'singular_name' => 'Client',
            'add_new_item' => 'Add New Client',
            'edit_item' => 'Edit Client',
            'new_item' => 'New Client',
            'view_item' => 'View Client',
            'search_items' => 'Search Clients'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));

    register_post_type('class', array(
        'label' => 'Class',
        'labels' => array(
            'name' => 'Classes',
            'singular_name' => 'Class',
            'add_new_item' => 'Add New Class',
            'edit_item' => 'Edit Class',
            'new_item' => 'New Class',
            'view_item' => 'View Class',
            'search_items' => 'Search Classes'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));
}
function custom_post_shortcode($atts) {
	extract( shortcode_atts( array(
        'type' => null,
		'id' => null,
		'count' => 'all',
        'order' => 'ASC',
        'orderby' => 'date',
        'wrap' => 'true',
        'showtitle' => 'true',
        'hrs' => 'false',
        'aslist' => 'false',
        'meta_key' => null,
        'excerpt' => 'false'
	), $atts ) );
    $args = array();
    $event_type = null;

    if (empty($type) && empty($id)) {
        $type = 'any';
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
          'orderby' => $orderby,
          'meta_key' => $meta_key
        );
    }
    $my_query = new WP_Query($args);
    if ( $my_query->have_posts() ) { 
        while ( $my_query->have_posts() ) { 
            $my_query->the_post();
            $new_content = null;

            // Handle event dates so we don't need both upcoming and past event custom post types
            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
            if (!is_null($event_type) && !empty($event_date)) {
                switch ($event_type) {
                    case 'upcoming_event':
                    if (strtotime($event_date) > $_SERVER['REQUEST_TIME']) {
                        $new_content = get_the_content();
                    }
                    break;
                    case 'past_event':
                    if (strtotime($event_date) < $_SERVER['REQUEST_TIME']) {
                        $new_content = get_the_content();
                    }
                    break;
                }
            } elseif ($excerpt == 'true') {
                global $more; $more=0;
                $new_content = '<p class="custom-entry-excerpt">'.get_the_content('Continue Reading &rarr;').'</p>';
                $more=1;
            } else { 
                $new_content = get_the_content();
            }

            if (!is_null($new_content)) {
                if ($showtitle == 'true') {
                    $new_content = '<h3 class="custom-entry-title"><a href="' . get_permalink(get_the_ID()) . '">' . get_the_title() . '</a></h3>' . $new_content;
                }
                if ($aslist == 'true') {
                    $contents[] = '<li class="custom-entry ' . get_post_type(get_the_ID()) . '">' . $new_content . '</li>';
                }
                elseif ($wrap == 'true') {
                    $contents[] = '<div class="custom-entry ' . get_post_type(get_the_ID()) . '">' . $new_content . '</div>';
                }
                else {
                    $contents[] = $new_content;
                }
            }
        }
    }
    if ($hrs == 'true') {
        $html = implode('<hr />', $contents);
    } elseif ($aslist == 'true') {
        $html = '<div id="featured-wrap"><ul class="featured bjqs">' . implode('', $contents) . '</ul></div>';
    } else {
        $html = implode('', $contents);
    }
    wp_reset_postdata();

	return $html;
}
function featured_shortcode($atts) {
    return do_shortcode('[custom-post orderby="rand" meta_key="featured" aslist="true"]');
}
function guest_author_name($name) {
    global $post;
    $author = get_post_meta($post->ID, 'author', true);
    if ( $author )
        $name = $author;
    return $name;
}
function cyberlaw_header_image_height() {
    return 66;
}
wp_enqueue_script('jquerycycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js', array('jquery'));
wp_enqueue_script('cyberlaw.js', get_bloginfo('stylesheet_directory') . '/cyberlaw.js', array('jquery'));
wp_enqueue_script('jquery-ui', get_bloginfo('stylesheet_directory') . '/jquery-ui-1.8.16.custom.min.js', array('jquery'));
wp_enqueue_script('hoverintent', get_bloginfo('stylesheet_directory') . '/jquery.hoverIntent.minified.js', array('jquery'));
wp_enqueue_script('bjqs', get_bloginfo('stylesheet_directory') . '/bjqs-1.3.min.js', array('jquery'));
add_action('init', 'add_fullwidth_footer');
add_action('init', 'add_custom_post_types');
add_shortcode( 'custom-post', 'custom_post_shortcode' );
add_shortcode( 'featured', 'featured_shortcode' );
add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );
add_filter('twentyten_header_image_height', 'cyberlaw_header_image_height');
?>
