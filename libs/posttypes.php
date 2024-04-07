<?php

add_action('init', 'projektjeden_init_posttypes');

function projektjeden_init_posttypes()
{
    $apartments_args = array(
        'labels' => array(
            'name' => 'Mieszkania',
            'singular_name' => 'Mieszkanie',
            'all_items' => 'Wszystkie mieszkania',
            'add_new' => 'Dodaj nowe mieszkanie',
            'add_new_item' => 'Dodaj nowe mieszkanie',
            'edit_item' => 'Edytuj mieszkanie',
            'new_item' => 'Nowe mieszkanie',
            'view_item' => 'Zobacz mieszkanie',
            'search_items' => 'Szukaj mieszkania',
            'not_found' => 'Nie znaleziono żadnego mieszkania',
            'not_found_in_trash' => 'Nie znaleziono żadnego mieszkania w koszu',
            'parent_item_colon' => ''
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array(
            'title', 'editor', 'excerpt', 'custom-fields', 'post-formats', 'author'
        ),
        'has_archive' => true
    );

    register_post_type('apartments', $apartments_args);
}

add_action('init', 'projektjeden_init_taxonomies');

function projektjeden_init_taxonomies()
{
    register_taxonomy(
        'building',
        array('apartments'),
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Budynek', 'taxonomy general name',
                'singular_name' => 'Budynek', 'taxonomy singular name',
                'search_items' => 'Znajdź budynek',
                'popular_items' => 'Najpopularniejsze budynki',
                'all_items' => 'Wszystkie budynki',
                'most_used_items' => null,
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => 'Edytuj budynek',
                'update_item' => 'Aktualizuj',
                'add_new_item' => 'Dodaj nowy budynek',
                'new_item_name' => 'Nazwa nowego budynku',
                'separate_items_with_commas' => 'Oddziel budynki przecinkiem',
                'add_or_remove_items' => 'Dodaj lub usuń budynek',
                'choose_from_most_used' => 'Wybierz spośród najczęściej wybieranych budynków',
                'menu_name' => 'Budynek'
            ),
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'building')
        )
    );

    register_taxonomy(
        'floor',
        array('apartments'),
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Piętro', 'taxonomy general name',
                'singular_name' => 'Piętro', 'taxonomy singular name',
                'search_items' => 'Odszukaj piętro',
                'popular_items' => 'Najpopularniejsze piętra',
                'all_items' => 'Wszystkie piętra',
                'most_used_items' => null,
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => 'Edytuj piętro',
                'update_item' => 'Aktualizuj',
                'add_new_item' => 'Dodaj nowe piętro',
                'new_item_name' => 'Nazwa nowego piętra',
                'separate_items_with_commas' => 'Oddziel piętra przecinkiem',
                'add_or_remove_items' => 'Dodaj lub usuń piętro',
                'choose_from_most_used' => 'Wybierz spośród najczęściej wybieranych pięter',
                'menu_name' => 'Piętro'
            ),
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'floor')
        )
    );

}

/* Inicjowanie możliwości wprowadzania zmian z poziomu admina w footerze poprzez panel administratora i widgety */

function projektjeden_widgets_init() {
	register_sidebar(array(
		'name' => 'Stopka',
		'id' => 'footer-widgets',
		'description' => 'Obszar dla stopki',
		'before_widget' => '<div class="widgetFooter">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	/*  Inicjowanie możliwości wprowadzania widgeta dla menu (osobnego) */
	register_sidebar(array(
		'name' => 'Stopka-menu',
		'id' => 'footer-widgets-menu',
		'description' => 'Obszar dla menu w stopce',
		'before_widget' => '<div class="widgetFooterMenu">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle footerrodo">',
		'after_title' => '</h2>',
	));
}

add_action('widgets_init', 'projektjeden_widgets_init');


function register_custom_menu() {
	register_nav_menu('header-menu', 'Header Menu'); // "header-menu" to identyfikator, a "Header Menu" to nazwa menu
}

add_action('init', 'register_custom_menu');

