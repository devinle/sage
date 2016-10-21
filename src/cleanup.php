<?php

namespace App;

/*
Cleanup
Most of the following can be referenced at http://bhoover.com/remove-unnecessary-code-from-your-wordpress-blog-header/
*/

//Remove all code bloat/emoji head bloat included with WP
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove Edit URI head bloat (if 3rd party integration stops working, remove this line)
remove_action ('wp_head', 'rsd_link');

// Remove Live Writer manifest link
remove_action( 'wp_head', 'wlwmanifest_link');

// Remove shortlink generator from posts or pages
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// Remove Wordpress generator
remove_action('wp_head', 'wp_generator');

// Remove the REST API lines from the HTML Header
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );

// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );


/*
Move jQuery to footer for non admin use (Better for performance)
*/
function moveJqueryToFooter() {
  if( !is_admin() && !is_user_logged_in() ){
    wp_deregister_script('jquery');
    //wp_register_script('jquery', ('//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'), false, '3.1.0', true);
    //wp_enqueue_script('jquery');
  }
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\moveJqueryToFooter', 100);
