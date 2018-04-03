<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    require 'post-types/Contact.php';
    require 'post-types/social.php';
    require 'post-types/Klub.php';
    require 'post-types/dokumenty.php';
    require 'post-types/sponsorzy-partnerzy.php';
    require 'post-types/media.php';
    require 'post-types/gadzety.php';

}

function fb_remove_menu_entries () {
    // with WP 3.1 and higher
    if ( function_exists( 'remove_menu_page' ) ) {
        remove_menu_page( 'tools.php' );
//        remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    } else {
        // unset comments
        unset( $GLOBALS['menu'][25] );
        // unset menuentry Discussion
        unset( $GLOBALS['submenu']['tools.php'][25] );
    }
}
add_action( 'admin_menu', 'fb_remove_menu_entries' );