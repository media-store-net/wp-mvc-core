<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Interface Findable
 *
 * Provides a contract for finding a specific record based on a unique identifier.
 * Classes implementing this interface must define the static `find` method.
 */
interface Findable
{
	/**
	 * Finds record based on an ID.
	 * @param mixed $id Record ID.
	 */
	public static function find( $id );
}
