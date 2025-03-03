<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * An interface defining a contract for objects that can be converted to a string representation.
 */
interface Stringable
{
	/**
	 * Returns string.
	 *
	 * @param string
	 */
	public function __toString();
}
