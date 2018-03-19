<?php

function dokumenty_init() {
	register_post_type( 'dokumenty', array(
		'labels'            => array(
			'name'                => __( 'Dokumenty', 'mks' ),
			'singular_name'       => __( 'Dokumenty', 'mks' ),
			'all_items'           => __( 'Wszystkie dokumenty', 'mks' ),
			'new_item'            => __( 'Nowy dokument', 'mks' ),
			'add_new'             => __( 'Dodaj nowy', 'mks' ),
			'add_new_item'        => __( 'Dodaj nowy dokument', 'mks' ),
			'edit_item'           => __( 'Edytuj dokumenty', 'mks' ),
			'view_item'           => __( 'Pokaż dokument', 'mks' ),
			'search_items'        => __( 'Szukaj dokumenty', 'mks' ),
			'not_found'           => __( 'Nie znaleziono dokumentów', 'mks' ),
			'not_found_in_trash'  => __( 'Nie znaleziono dokumentów w koszu', 'mks' ),
			'parent_item_colon'   => __( 'Parent dokumenty', 'mks' ),
			'menu_name'           => __( 'Dokumenty', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-download',
		'show_in_rest'      => true,
		'rest_base'         => 'dokumenty',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'dokumenty_init' );

function dokumenty_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['dokumenty'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Dokumenty updated. <a target="_blank" href="%s">View dokumenty</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Dokumenty updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Dokumenty restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Dokumenty published. <a href="%s">View dokumenty</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Dokumenty saved.', 'mks'),
		8 => sprintf( __('Dokumenty submitted. <a target="_blank" href="%s">Preview dokumenty</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Dokumenty scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview dokumenty</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Dokumenty draft updated. <a target="_blank" href="%s">Preview dokumenty</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'dokumenty_updated_messages' );
