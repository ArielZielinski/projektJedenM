<?php
/*
function get_dt() {
    echo "<tr>";
    echo "<td>1</td>";
    echo "<td>Rezerwacja</td>";
    echo "<td>Parter</td>";
    echo "<td>96,57m<sup>2</sup></td>";
    echo "<td><button class='askprice'>ZAPYTAJ O CENĘ</button></td>";
    echo "<td><button class='info'>O LOKALU</button></td>";
    echo "<td><button class='karta'>KARTA APARTAMENTU</button></td>";
    echo  "</tr>";
    exit();  //die();
}

add_action( 'wp_ajax_nopriv_get_dt', 'get_dt' );
add_action( 'wp_ajax_get_dt', 'get_dt' );
*/
if ( ! define( 'PROJEKTJEDEN_THEME_DIR', '' ) ) {
    define( 'PROJEKTJEDEN_THEME_DIR', get_theme_root() . '/' . get_template() . '/' );
}
if ( ! define( 'PROJEKTJEDEN_THEME_URL', '' ) ) {
    define( 'PROJEKTJEDEN_THEME_URL', WP_CONTENT_URL . '/themes' . get_template() . '/' );
}

require_once PROJEKTJEDEN_THEME_DIR . 'libs/posttypes.php';
require_once PROJEKTJEDEN_THEME_DIR . 'libs/utils.php';


/* SKRYPT AJAX */


function get_apartments() {

	// Pobierz wartość 'building' z żądania AJAX
	$selected_building = $_POST['building'];

	// Przygotuj argumenty dla WP_Query
	$args = array(
		'posts_per_page' => -1, // Pobierz wszystkie mieszkania
		'post_type' => 'apartments',
		'tax_query' => array(
			array(
				'taxonomy' => 'building',
				'field' => 'name',
				'terms' => $selected_building,
			),
		),
	);

	$apartments_query = new WP_Query($args);

	if ($apartments_query->have_posts()) :
		$apartments = array();

		while ($apartments_query->have_posts()) : $apartments_query->the_post();
			// Pobierz dane mieszkania (custom fields i taxonomies)
			$customFieldValueNumer = get_post_meta(get_the_ID(), 'NUMER', true);
			$customFieldValueStatus = get_post_meta(get_the_ID(), 'STATUS', true);
			$customTaxonomyPietro = get_the_terms(get_the_ID(), 'floor');
			$customFieldValueMetraz = get_post_meta(get_the_ID(), 'METRAŻ', true);

			// Utwórz tablicę dla każdego apartamentu z kluczem sortującym (numerem apartamentu)
			$apartments[$customFieldValueNumer] = array(
				'numer' => $customFieldValueNumer,
				'status' => $customFieldValueStatus,
				'pietro' => !empty($customTaxonomyPietro) ? implode(', ', wp_list_pluck($customTaxonomyPietro, 'name')) : '',
				'metraz' => $customFieldValueMetraz,
			);
		endwhile;

		// Posortuj tablicę według numerów apartamentów
		ksort($apartments);

		// Wyświetl posortowane dane
		foreach ($apartments as $apartment) {
			echo "<tr>";
			echo "<td>{$apartment['numer']}</td>";
			echo "<td>{$apartment['status']}</td>";
			echo "<td>{$apartment['pietro']}</td>";
			echo "<td>{$apartment['metraz']} m<sup>2</sup></td>";
			echo "<td><button class='askprice'>ZAPYTAJ O CENĘ</button></td>";
			echo '<td><a href="' . esc_url(get_permalink()) . '" target="_blank"><button class="info">O LOKALU</button></a></td>';
			echo "<td><a href='" . PROJEKTJEDEN_THEME_URL . "pdf/apartament4.pdf' download><button class='karta'>KARTA APARTAMENTU</button></a></td>";
			echo "</tr>";
		}
	else:
		echo "<style> .tb0 {display: none;}</style>";
		echo "<tr><td colspan='7'>Brak dostępnych mieszkań w wybranym budynku.</td></tr>";
	endif;

	wp_reset_postdata();
	exit(); // Zakończ żądanie AJAX
}


add_action('wp_ajax_nopriv_get_apartments', 'get_apartments');
add_action('wp_ajax_get_apartments', 'get_apartments');


function enqueue_custom_script() {
    wp_enqueue_script('JavaScript', get_template_directory_uri() . '/js/JavaScript.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_script');



