<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Interface for classes that handle parent-child relationships.
 */
interface Parentable
{
	/**
	 * Returns an array collection of the implemented class based on parent ID.
	 * Returns children from parent.
	 *
	 * @param int $id Parent post ID.
	 *
	 * @return array
	 */
	public static function from( $id );
}
