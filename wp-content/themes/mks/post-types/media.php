<?php

function media_init() {
	register_post_type( 'media', array(
		'labels'            => array(
			'name'                => __( 'Media', 'mks' ),
			'singular_name'       => __( 'Media', 'mks' ),
			'all_items'           => __( 'Wszystkie dla Mediów', 'mks' ),
			'new_item'            => __( 'Nowe dla Mediów', 'mks' ),
			'add_new'             => __( 'Dodaj Nowy', 'mks' ),
			'add_new_item'        => __( 'Dodaj nowy Dla Mediów', 'mks' ),
			'edit_item'           => __( 'Edytuj Dla Mediów', 'mks' ),
			'view_item'           => __( 'Wyświetl Dla Mediów', 'mks' ),
			'search_items'        => __( 'Szukaj w Dla Mediów', 'mks' ),
			'not_found'           => __( 'No media found', 'mks' ),
			'not_found_in_trash'  => __( 'No media found in trash', 'mks' ),
			'parent_item_colon'   => __( 'Parent media', 'mks' ),
			'menu_name'           => __( ' Dla Mediów', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-megaphone',
		'show_in_rest'      => true,
		'rest_base'         => 'media',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'media_init' );

function media_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['media'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Media updated. <a target="_blank" href="%s">View media</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Media updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Media restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Media published. <a href="%s">View media</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Media saved.', 'mks'),
		8 => sprintf( __('Media submitted. <a target="_blank" href="%s">Preview media</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Media scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview media</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Media draft updated. <a target="_blank" href="%s">Preview media</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'media_updated_messages' );
