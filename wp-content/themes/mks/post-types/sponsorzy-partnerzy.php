<?php

function sponsorzy_partnerzy_init() {
	register_post_type( 'sponsorzy-partnerzy', array(
		'labels'            => array(
			'name'                => __( 'Sponsorzy/partnerzy', 'mks' ),
			'singular_name'       => __( 'Sponsorzy/partnerzy', 'mks' ),
			'all_items'           => __( 'Wszyscy sponsorzy/partnerzy', 'mks' ),
			'new_item'            => __( 'Nowy sponsor/partner', 'mks' ),
			'add_new'             => __( 'Dodaj Nowy', 'mks' ),
			'add_new_item'        => __( 'Dodaj nowego sponsora/partnera', 'mks' ),
			'edit_item'           => __( 'Edytuj sponsorów/partnerów', 'mks' ),
			'view_item'           => __( 'Przegadaj sponsorów/partnerów', 'mks' ),
			'search_items'        => __( 'Szukaj sponsorów/partnerów', 'mks' ),
			'not_found'           => __( 'Nie znaleziono sponsorów/partnerów', 'mks' ),
			'not_found_in_trash'  => __( 'Nie znaleziono sponsorów/partnerów w koszu', 'mks' ),
			'parent_item_colon'   => __( 'Parent sponsorzy partnerzy', 'mks' ),
			'menu_name'           => __( 'Sponsorzy Partnerzy', 'mks' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-universal-access-alt',
		'show_in_rest'      => true,
		'rest_base'         => 'sponsorzy-partnerzy',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'sponsorzy_partnerzy_init' );

function sponsorzy_partnerzy_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sponsorzy-partnerzy'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Sponsorzy partnerzy updated. <a target="_blank" href="%s">View sponsorzy partnerzy</a>', 'mks'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mks'),
		3 => __('Custom field deleted.', 'mks'),
		4 => __('Sponsorzy partnerzy updated.', 'mks'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Sponsorzy partnerzy restored to revision from %s', 'mks'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Sponsorzy partnerzy published. <a href="%s">View sponsorzy partnerzy</a>', 'mks'), esc_url( $permalink ) ),
		7 => __('Sponsorzy partnerzy saved.', 'mks'),
		8 => sprintf( __('Sponsorzy partnerzy submitted. <a target="_blank" href="%s">Preview sponsorzy partnerzy</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Sponsorzy partnerzy scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview sponsorzy partnerzy</a>', 'mks'),
		// translators: Publish box date format, see https://secure.php.net/manual/en/function.date.php
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Sponsorzy partnerzy draft updated. <a target="_blank" href="%s">Preview sponsorzy partnerzy</a>', 'mks'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sponsorzy_partnerzy_updated_messages' );
