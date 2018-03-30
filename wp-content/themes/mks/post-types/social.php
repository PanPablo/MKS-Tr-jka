<?php

function social_init() {
	register_post_type( 'social', array(
		'labels'            => array(
			'name'                => __( 'Socials', 'mks' ),
			'singular_name'       => __( 'Social', 'mks' ),
			'all_items'           => __( 'Wszystkie społeczności', 'mks' ),
			'new_item'            => __( 'Nowa do społeczności', 'mks' ),
			'add_new'             => __( 'Dodaj nowy ', 'mks' ),
			'add_new_item'        => __( 'Dodaj nowy do Społeczności', 'mks' ),
			'edit_item'           => __( 'Edytuj społeczności', 'mks' ),
			'view_item'           => __( 'Wyświetl społeczności', 'mks' ),
			'search_items'        => __( 'Szukaj społeczności', 'mks' ),
			'not_found'           => __( 'No socials found', 'mks' ),
			'not_found_in_trash'  => __( 'No socials found in trash', 'mks' ),
			'parent_item_colon'   => __( 'Parent social', 'mks' ),
			'menu_name'           => __( 'Społeczności', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-share',
		'show_in_rest'      => true,
		'rest_base'         => 'social',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'social_init' );

function social_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['social'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Social updated. <a target="_blank" href="%s">View social</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Social updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Social restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Social published. <a href="%s">View social</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Social saved.', 'mks'),
		8 => sprintf( __('Social submitted. <a target="_blank" href="%s">Preview social</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Social scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview social</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Social draft updated. <a target="_blank" href="%s">Preview social</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'social_updated_messages' );
