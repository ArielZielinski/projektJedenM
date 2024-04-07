<! HEADER ->
<?php get_header(); ?>


<div class="header">

	<!- SLADESHOW ->
	<div class="headerslade fade">
		<div class="slide s1">
			<img src="<?php echo get_template_directory_uri(); ?>/source/zako.png" width="100%" alt="Góralski hotel spowity śniegiem. Przystrojony lampkami świątecznymi">
		</div>
		<div class="slide s2">
			<img src="<?php echo get_template_directory_uri(); ?>/source/zako5po.jpg" width="100%" alt="Morskie oko w polskich górach">
		</div>
		<div class="slide s3">
			<img src="<?php echo get_template_directory_uri(); ?>/source/zako%206po.jpg" width="100%" alt="Góralska farma spowita śniegiem. W powietrzu unosi się mgła, a w oddali widać d">
		</div>
		<div class="headoverlay">
		</div>
	</div>
	<div class="dots">
		<span class="dot d1"></span>
		<span class="dot d2"></span>
		<span class="dot d3"></span>
	</div>




	<!- HEADER REST THINGS ->

    <div class="menuswitch">
        <div class="menu">
            <!--
            <ul>
                <li><a href="index.php?menu=home">Strona Główna</a></li>
                <li><a href="index.php?menu=podstrona1">Podstrona 1</a></li>
                <li><a href="index.php?menu=podstrona2">Podstrona 2</a></li>
                <li><a href="index.php?menu=podstrona3">Podstrona 3</a></li>
                <li><a href="index.php?menu=podstrona4">Podstrona 4</a></li>
                <li><a href="index.php?menu=podstrona5">Podstrona 5</a></li>
            </ul>
            -->
            <?php
                if (has_nav_menu('header-menu')) {
                    wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'headerBoxMenu'));
                }
            ?>
        </div>
    </div>


	<div class="logo">
		<img src="<?php echo get_template_directory_uri(); ?>/source/g9.png" height="66" width="254">
	</div>

	<div class="headtxtborder">
		<div class="headtxt">
			<p>„Świat wartości w górach jest prosty i przejrzysty dla każdego. Ale jest to absolut piękna i
				estetycznych doznań. Nie chcesz, nie jedziesz. Nie jedziesz, nie widzisz. Nie widzisz, nie
				przeżywasz. Wybór należy do ciebie.”</p>
			<p class="headTxtSign">Piotr Pustelnik</p>
		</div>
		<div class="headtxt">
			<p>„Lorem ipsum dolor sit amet, consectetur adipiscing elit,
				sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.”</p>
			<p class="headTxtSign">Lorem Ipsum</p>
		</div>
		<div class="headtxt">
			<p>„Quo harum assumenda et voluptas quibusdam aut ratione voluptatem aut repudiandae eaque rem
				laboriosam nulla sit architecto explicabo? Aut quia repellat ut doloremque adipisci ut quos
				repudiandae rem deleniti minus. ”</p>
			<p class="headTxtSign">Ipsum Lorem Sol</p>
		</div>
		<div class="headtxtback">
		</div>
	</div>

	<div class="headertitle">
		<h3>luxury mountain homes</h3>
	</div>

</div>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        let htxt = document.getElementsByClassName("headtxt");

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < htxt.length; i++) {
            htxt[i].style.display = "none";
        }

        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }

        slideIndex++;

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex - 1].style.display = "block";
        htxt[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 8000); // Change image every 8 seconds
    }
</script>


<! CONTENT ->
<div class="content">
	<p class="contentSmallTitle">Cyrhla villas II</p>
	<p class="contentBigTitle">Zobacz dostępność</p>

	<form class="formselect" action="">
		<label for="buildings" class="buildingslebel">WYBIERZ BUDYNEK: </label>
		<!-- <input list="building"> -->
		<select id="buildings" class="list" name="building">
			<option value="VILLA CROCUS" selected>VILLA CROCUS</option>
			<option value="VILLA SILENE">VILLA SILENE</option>
			<option value="VILLA PRIMULA">VILLA PRIMULA</option>
		</select>
	</form>
	<hr style="width: 1000px;"/>
	<div class="tbdiv">
		<table>
			<thead class="tb0">
			<tr>
				<th>NUMER</th>
				<th>STATUS</th>
				<th>PIĘTRO</th>
				<th>METRAŻ</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody id="txtHint" class="tbb">

			</tbody>
		</table>
	</div>
</div>

<! FOOTER ->
<?php get_footer(); ?>

