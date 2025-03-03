<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Interface JSONable
 *
 * Provides a contract for objects that can be converted to JSON representation.
 */
interface JSONable
{
	/**
	 * Returns json string.
	 *
	 * @param string
	 */
	public function to_json();
}
