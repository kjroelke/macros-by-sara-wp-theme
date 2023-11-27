<?php
/** The Mobile Menu
 *
 * @package MacrosBySara
 * @since 1.0
 */

?>
<div class="hamburger btn d-lg-none d-inline-flex flex-column justify-content-evenly align-items-stretch" data-bs-toggle="offcanvas" data-bs-target="#mobileMainMenu"
	aria-controls="mobileMainMenu">
	<span class=" hamburger__line"></span>
	<span class="hamburger__line"></span>
	<span class="hamburger__line"></span>
</div>
<div class="offcanvas offcanvas-end px-3" tabindex="-1" id="mobileMainMenu" aria-labelledby="mobileMainMenuLabel">
	<div class="offcanvas__header">
		<h5 class="offcanvas__title headline" id="mobileMainMenuLabel">Navigation</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas__body">
		<?php
		if ( has_nav_menu( 'mobile_menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'mobile_menu',
					'menu_class'      => 'mobile-navbar__menu p-0 m-0 d-inline-flex flex-column',
					'container'       => 'nav',
					'container_class' => 'mobile-navbar d-flex align-items-center',
					'walker'          => new CNO_Navwalker(),
				)
			);
		}
		?>
	</div>
</div>