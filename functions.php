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

    register_post_type('newsletter', array(
        'label' => 'Newsletters',
        'labels' => array(
            'name' => 'Newsletters',
            'singular_name' => 'Newsletter',
            'add_new_item' => 'Add New Newsletter',
            'edit_item' => 'Edit Newsletter',
            'new_item' => 'New Newsletter',
            'view_item' => 'View Newsletter',
            'search_items' => 'Search Newsletters'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'custom-fields')
    ));
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
function read_more_link( $more_link, $more_link_text ) {
	return str_replace('Continue reading', '', $more_link );
}
wp_enqueue_script('jquerycycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js', array('jquery'));
wp_enqueue_script('cyberlaw.js', get_bloginfo('stylesheet_directory') . '/cyberlaw.js', array('jquery'));
wp_enqueue_script('jquery-ui', get_bloginfo('stylesheet_directory') . '/jquery-ui-1.8.16.custom.min.js', array('jquery'));
wp_enqueue_script('hoverintent', get_bloginfo('stylesheet_directory') . '/jquery.hoverIntent.minified.js', array('jquery'));
wp_enqueue_script('bjqs', get_bloginfo('stylesheet_directory') . '/bjqs-1.3.min.js', array('jquery'));
add_action('init', 'add_fullwidth_footer');
add_action('init', 'add_custom_post_types');
add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );
add_filter('twentyten_header_image_height', 'cyberlaw_header_image_height');
add_filter( 'the_content_more_link', 'read_more_link', 10, 2 );
?>
