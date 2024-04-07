<?php
get_header(); // Dodaj nagłówek strony
while (have_posts()) : the_post();
    ?>
    <h1><?php the_title(); ?></h1>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php
endwhile;
get_footer(); // Dodaj stopkę strony