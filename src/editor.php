<?php

namespace App;

/*
Extend the TinyMCE Editor
*/

/*
* Will position a new button in the TinyMCE allowing content editor to select some defined presets
*/
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', __NAMESPACE__ . '\\my_mce_buttons_2' );

/*
* Will actually add a class to the new button previously defined for use in the Tiny MCE
*/
function my_mce_before_init_insert_formats( $init_array ) {
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Inline Tweet',
            'inline' => 'span',
            'classes' => 'js-inline-tweet',
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\\my_mce_before_init_insert_formats' );


/*
* Will remove unwanted editor buttons
*/
function tinymce_editor_buttons($buttons) {
    return array(
    "styleselect",
    "formatselect",
    "bold",
    "italic",
    "bullist",
    "numlist",
    "blockquote",
    "link",
    "unlink",
    "alignleft",
    "aligncenter",
    "alignright",
    "pastetext"
  );
}
add_filter('mce_buttons', __NAMESPACE__ . '\\tinymce_editor_buttons'); //targets the first line

/*
* Will also remove unwanted editor buttons
*/
function tinymce_editor_buttons_2($buttons) {
return array();
}
add_filter('mce_buttons_2', __NAMESPACE__ . '\\tinymce_editor_buttons_2'); //targets the first line
