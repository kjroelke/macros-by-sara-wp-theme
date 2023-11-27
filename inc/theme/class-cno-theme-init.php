<?php
/**
 * Initializes the Theme
 *
 * @since 1.3
 * @package MacrosBySara
 */

/**
 * Functions, Hooks and/or Filters the theme needs to run.
 */
class CNO_Theme_Init {
	/** Constructor */
	public function __construct() {
		$this->load_required_files();
		$this->disable_discussion();
		$this->cno_set_environment();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_cno_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'cno_theme_support' ) );
		add_action( 'init', array( $this, 'alter_post_types' ) );
	}

	/** Load required files. */
	private function load_required_files() {
		require_once dirname( __DIR__, 1 ) . '/acf/acf-fields/initial-acf-fields.php';
		require_once dirname( __DIR__, 1 ) . '/acf/acf-classes/class-acf-generator.php';
		require_once dirname( __DIR__, 1 ) . '/acf/acf-classes/class-acf-image.php';
		require_once __DIR__ . '/asset-loader/enum-enqueue-type.php';
		require_once __DIR__ . '/asset-loader/class-asset-loader.php';
		require_once __DIR__ . '/navwalkers/class-cno-navwalker.php';
		require_once __DIR__ . '/navwalkers/class-cno-mega-menu.php';
		require_once dirname( __DIR__, 1 ) . '/component-classes/class-cno-content-sections.php';
		require_once __DIR__ . '/theme-functions.php';
	}

	/** Remove comments, pings and trackbacks support from posts types. */
	private function disable_discussion() {
		// Close comments on the front-end
		add_filter( 'comments_open', '__return_false', 20, 2 );
		add_filter( 'pings_open', '__return_false', 20, 2 );

		// Hide existing comments.
		add_filter( 'comments_array', '__return_empty_array', 10, 2 );

		// Remove comments page in menu.
		add_action(
			'admin_menu',
			function () {
				remove_menu_page( 'edit-comments.php' );
			}
		);

		// Remove comments links from admin bar.
		add_action(
			'init',
			function () {
				if ( is_admin_bar_showing() ) {
					remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
				}
			}
		);
	}

	/** Sets an Environment Variable */
	private function cno_set_environment() {
		$server_name = $_SERVER['SERVER_NAME'];

		if ( false !== strpos( $server_name, '.local' ) ) {
			$_ENV['CNO_ENV'] = 'dev';
		} elseif ( false !== strpos( $server_name, 'wpengine' ) ) {
			$_ENV['CNO_ENV'] = 'stage';
		} else {
			$_ENV['CNO_ENV'] = 'prod';
		}
	}

	/**
	 * Adds scripts with the appropriate dependencies
	 */
	public function enqueue_cno_scripts() {
		$bootstrap   = new Asset_Loader( 'bootstrap', Enqueue_Type::both, 'vendors' );
		$fontawesome = new Asset_Loader( 'fontawesome', Enqueue_Type::script, 'vendors' );

		$global_scripts = new Asset_Loader( 'global', Enqueue_Type::both, null, array( 'bootstrap' ) );
		wp_localize_script( 'global', 'cnoSiteData', array( 'rootUrl' => home_url() ) );

		// style.css
		wp_enqueue_style(
			'main',
			get_stylesheet_uri(),
			array( 'global' ),
			false, //phpcs:ignore
		);

		$this->remove_wordpress_styles( array( 'classic-theme-styles', 'wp-block-library', 'dashicons', 'global-styles' ) );
	}

	/**
	 * Provide an array of handles to dequeue.
	 *
	 * @param array $handles the script/style handles to dequeue.
	 */
	private function remove_wordpress_styles( array $handles ) {
		foreach ( $handles as $handle ) {
			wp_dequeue_style( $handle );
		}
	}

	/** Register Theme Support for Featured Images and WP native `<title>` config */
	public function cno_theme_support() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'primary_menu' => __( 'Primary Menu', 'cno' ),
				'mobile_menu'  => __( 'Mobile Menu', 'cno' ),
				'footer_menu'  => __( 'Footer Menu', 'cno' ),
			)
		);
	}

	/** Remove post type support from posts types. */
	public function alter_post_types() {
		$post_types = array( 'post', 'page' );
		foreach ( $post_types as $post_type ) {
			$this->disable_post_type_support( $post_type );
		}
	}

	/** Disable post-type-supports from posts
	 *
	 * @param string $post_type the post type to remove supports from.
	 */
	private function disable_post_type_support( string $post_type ) {
		$supports = array( 'editor', 'comments', 'trackbacks', 'revisions', 'author' );
		foreach ( $supports as $support ) {
			if ( post_type_supports( $post_type, $support ) ) {
				remove_post_type_support( $post_type, $support );
			}
		}
	}
}
