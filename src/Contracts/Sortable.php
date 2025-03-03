<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Interface that defines methods for sorting functionalities.
 */
interface Sortable
{
	/**
	 * Sorts results by specific field and direction.
	 *
	 * @param string $attribute Attribute to sort by.
	 * @param string $sort_flag Sort direction.
	 *
	 * @return this for chaining
	 */
	public function sort_by( $attribute, $sort_flag = SORT_REGULAR );
}
