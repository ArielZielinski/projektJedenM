<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		// Pętla WordPress
		while (have_posts()) :
			the_post();

			// Wyświetlanie tytułu strony
			the_title('<h1 class="entry-title">', '</h1>');

			// Wyświetlanie treści strony
			the_content();

		endwhile; // Koniec pętli WordPress
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
