<?php

namespace MediaStoreNet\MVC_Core\Traits;

/**
 * Trait CastTrait
 *
 * Provides functionality to construct an object from a WP_Post or an array of attributes
 * and to cast the object back to a WP_Post instance.
 */
trait CastTrait
{
	/**
	 * Constructs object based on passed object.
	 * Should be an array of attributes or a WP_Post.
	 *
	 * @param mixed $object Array of attributes or a WP_Post.
	 */
	public function from_post( $object )
	{
		if ( is_array( $object ) ) {

			$this->attributes = $object;

		} else if ( is_a( $object, 'WP_Post' ) ) {

			$this->attributes = $object->to_array();

		}

		if ( ! empty( $this->attributes ) ) {

			$this->load_meta();

		}

		return $this;
	}

	/**
	 * Cast object into a WP_Post.
	 *
	 * @return object
	 */
	public function to_post()
	{
		return \WP_Post::get_instance( $this->attributes['ID'] );
	}
}
