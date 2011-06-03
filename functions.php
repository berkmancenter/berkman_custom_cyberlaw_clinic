<?php 
function create_menu() {
	if (class_exists('CSSDropDownMenu'))
	{
		$myMenu = new CSSDropDownMenu(); 
		/* Extra options here, like so: $myMenu->orientation="top"; */ 
		$myMenu->show(); 
	}
}
wp_enqueue_script('jquery', 'jquery');
wp_enqueue_script('jquerycycle', get_bloginfo('stylesheet_directory') . '/jquery.cycle.all.min.js');
wp_enqueue_script('cyberlaw.js', get_bloginfo('stylesheet_directory') . '/cyberlaw.js');
//add_action('get_header', 'create_menu');
?>
