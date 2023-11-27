<?php
/**
 * The Super ACF class that all children inherit
 *
 * @package MacrosBySara
 * @since 2.0
 */

/**
 * The abstract class for creating content generator classes with ACF fields
 */
abstract class ACF_Generator {
	/**
	 * The post_id associated with the acf fields
	 *
	 * @var int|string $post_id
	 */
	protected int|string $post_id;

	/**
	 * The ACF Image
	 *
	 * @var ?ACF_Image $image
	 */
	protected ?ACF_Image $image;

	/** Inits the class
	 *
	 * @param int|string $post_id the post id
	 * @param array      $acf_fields the acf fields
	 */
	public function __construct( int|string $post_id, array $acf_fields ) {
		$this->post_id = $post_id;
		$this->init_props( $acf_fields );
	}

	/** Sets class props to ACF fields
	 *
	 * @param array $acf the acf array
	 */
	abstract protected function init_props( array $acf );

	/**
	 * Sets the class property $image to a new ACF_Image
	 *
	 * @param array $image the ACF Image array
	 */
	protected function set_the_image( array $image ) {
		if ( is_array( $image ) ) {
			$this->image = new ACF_Image( $image );
		}
	}
}
