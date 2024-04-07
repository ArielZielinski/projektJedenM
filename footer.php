<div class="footer">
    <div class="footercontent">
        <div class="footerlogo">
        </div>
		<?php

		if ( is_active_sidebar( 'footer-widgets' ) ) {
			dynamic_sidebar( 'footer-widgets' );
		}

		if ( is_active_sidebar( 'footer-widgets-menu' ) ) {
			dynamic_sidebar( 'footer-widgets-menu' );
		}
		?>
    </div>
</div>
<?php
    include "js/headerSlider.js";

    wp_footer();
?>
</body>