<?php
/**
 * Homepage Template
 *
 * @author KJ Roelke
 * @since 1.0
 * @package MacrosBySara
 */

$loader = new Asset_Loader( 'frontPage', Enqueue_Type::both, 'pages' );

get_header(); ?>
<main class="site-content">
	<section id="section-2"></section>
</main>
<?php
get_footer();