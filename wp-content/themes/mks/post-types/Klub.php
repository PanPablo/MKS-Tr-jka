<?php

function Klub_init() {
	register_post_type( 'Klub', array(
		'labels'            => array(
			'name'                => __( 'Klub', 'mks' ),
			'singular_name'       => __( 'Klub', 'mks' ),
			'all_items'           => __( 'All Klub', 'mks' ),
			'new_item'            => __( 'New klub', 'mks' ),
			'add_new'             => __( 'Add New', 'mks' ),
			'add_new_item'        => __( 'Add New klub', 'mks' ),
			'edit_item'           => __( 'Edit klub', 'mks' ),
			'view_item'           => __( 'View klub', 'mks' ),
			'search_items'        => __( 'Search klubs', 'mks' ),
			'not_found'           => __( 'No klub found', 'mks' ),
			'not_found_in_trash'  => __( 'No klub found in trash', 'mks' ),
			'parent_item_colon'   => __( 'Parent klub', 'mks' ),
			'menu_name'           => __( 'Klub', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'Klub',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'Klub_init' );

function Klub_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['Klub'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Klub updated. <a target="_blank" href="%s">View klub</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Klub updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Klub restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Klub published. <a href="%s">View klub</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Klub saved.', 'mks'),
		8 => sprintf( __('Klub submitted. <a target="_blank" href="%s">Preview klub</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Klub scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview klub</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Klub draft updated. <a target="_blank" href="%s">Preview klub</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'Klub_updated_messages' );
