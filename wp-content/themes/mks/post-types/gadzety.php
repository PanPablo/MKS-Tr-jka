<?php

function gadzety_init() {
	register_post_type( 'gadzety', array(
		'labels'            => array(
			'name'                => __( 'Gadżety', 'mks' ),
			'singular_name'       => __( 'Gadżety', 'mks' ),
			'all_items'           => __( 'Wszystkie Gadżety', 'mks' ),
			'new_item'            => __( 'Nowy gadżet', 'mks' ),
			'add_new'             => __( 'Dodaj Nowy', 'mks' ),
			'add_new_item'        => __( 'Dodaj Nowy Gadżet', 'mks' ),
			'edit_item'           => __( 'Edytuj Gadżet', 'mks' ),
			'view_item'           => __( 'Wyświetl Gadżety', 'mks' ),
			'search_items'        => __( 'Szukaj w Gadżetach', 'mks' ),
			'not_found'           => __( 'Nie znaleziono Gadżetu', 'mks' ),
			'not_found_in_trash'  => __( 'Nie znaleziono Gadżetu w koszu', 'mks' ),
			'parent_item_colon'   => __( 'Parent gadzety', 'mks' ),
			'menu_name'           => __( 'Gadżety', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-cart',
		'show_in_rest'      => true,
		'rest_base'         => 'gadzety',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'gadzety_init' );

function gadzety_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['gadzety'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Gadzety updated. <a target="_blank" href="%s">View gadzety</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Gadzety updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Gadzety restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Gadzety published. <a href="%s">View gadzety</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Gadzety saved.', 'mks'),
		8 => sprintf( __('Gadzety submitted. <a target="_blank" href="%s">Preview gadzety</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Gadzety scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview gadzety</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Gadzety draft updated. <a target="_blank" href="%s">Preview gadzety</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'gadzety_updated_messages' );
