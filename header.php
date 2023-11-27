<?php
/**
 * Basic Header Template
 *
 * @package MacrosBySara
 */

?>

<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="d-flex" id="site-header">
		<div class="navbar container py-4 d-flex justify-content-between">
			<a class="d-inline-block" href="<?php echo esc_url( site_url() ); ?>" class="logo" aria-label="to Home Page">
				<figure class="logo-image d-inline-block m-0">
					<?php
					global $SITE_LOGO;
					echo $SITE_LOGO;
					?>
					<h1>
						<?php echo bloginfo( 'name' ); ?>
					</h1>
				</figure>
			</a>
			<?php
			if ( has_nav_menu( 'primary_menu' ) ) {
				wp_nav_menu(
					array(
						'theme_location'  => 'primary_menu',
						'menu_class'      => 'navbar__menu p-0 m-0 d-inline-flex',
						'container'       => 'nav',
						'container_class' => 'navbar d-none d-lg-flex align-items-center',
						'walker'          => new CNO_Navwalker(),
					)
				);
			}
			get_template_part( 'template-parts/nav', 'mobile-menu' );
			?>
		</div>
	</header>