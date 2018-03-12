<?php

function Contact_init() {
	register_post_type( 'Contact', array(
		'labels'            => array(
			'name'                => __( 'Contacts', 'mks' ),
			'singular_name'       => __( 'Contact', 'mks' ),
			'all_items'           => __( 'All Contacts', 'mks' ),
			'new_item'            => __( 'New contact', 'mks' ),
			'add_new'             => __( 'Add New', 'mks' ),
			'add_new_item'        => __( 'Add New contact', 'mks' ),
			'edit_item'           => __( 'Edit contact', 'mks' ),
			'view_item'           => __( 'View contact', 'mks' ),
			'search_items'        => __( 'Search contacts', 'mks' ),
			'not_found'           => __( 'No contacts found', 'mks' ),
			'not_found_in_trash'  => __( 'No contacts found in trash', 'mks' ),
			'parent_item_colon'   => __( 'Parent contact', 'mks' ),
			'menu_name'           => __( 'Contacts', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-phone',
		'show_in_rest'      => true,
		'rest_base'         => 'Contact',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'Contact_init' );

function Contact_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Contact'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Contact updated. <a target="_blank" href="%s">View contact</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Contact updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Contact restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Contact published. <a href="%s">View contact</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Contact saved.', 'mks'),
		8 => sprintf( __('Contact submitted. <a target="_blank" href="%s">Preview contact</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Contact scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview contact</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Contact draft updated. <a target="_blank" href="%s">Preview contact</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'Contact_updated_messages' );
