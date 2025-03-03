<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Interface representing an object that can be constructed from and cast to a WP_Post instance or equivalent data.
 */
interface PostCastable
{
	/**
	 * Constructs object based on passed object.
	 * Should be an array of attributes or a WP_Post.
	 *
	 * @param mixed $object Array of attributes or a WP_Post.
	 */
	public function from_post( $object );

	/**
	 * Cast object into a WP_Post.
	 *
	 * @return object
	 */
	public function to_post();
}
