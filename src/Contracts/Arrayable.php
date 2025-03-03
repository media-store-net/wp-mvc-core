<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Interface Arrayable
 *
 * A contract that ensures implementing classes can be converted to arrays.
 */
interface Arrayable
{
	/**
	 * Returns object converted to array.
	 *
	 * @param array.
	 */
	public function to_array();
}
