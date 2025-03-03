<?php

namespace MediaStoreNet\MVC_Core;

use ArrayObject;
use MediaStoreNet\MVC_Core\Contracts\Stringable as Stringable;
use MediaStoreNet\MVC_Core\Contracts\JSONable as JSONable;
use MediaStoreNet\MVC_Core\Contracts\Sortable as Sortable;

/**
 * The Collection class represents a collection of elements, extending ArrayObject.
 * It provides methods for sorting, grouping, and converting the collection to JSON or string format.
 */
class Collection extends ArrayObject implements Sortable, JSONable, Stringable
{
	/**
	 * Sorts results by specific field and direction.
	 *
	 * @param string $attribute Attribute to sort by.
	 * @param string $sort_flag Sort direction.
	 *
	 * @return this for chaining
	 */
	public function sort_by( $attribute, $sort_flag = SORT_REGULAR )
	{
		$values = array();

		for ( $i = count( $this ) -1; $i >= 0; --$i ) {
			$values[] = $this[$i]->$attribute;
		}

		$values = array_unique($values);

		sort( $values, $sort_flag );

		$new = new self();

		foreach ( $values as $value ) {
			for ( $i = count( $this ) -1; $i >= 0; --$i ) {
				if ( $value == $this[$i]->$attribute ) {
					$new[] = $this[$i];
				}
			}
		}

		return $new;
	}

	/**
	 * Groups collection by attribute name,
	 *
	 * @param string $attribute Attribute to group by.
	 *
	 * @return this for chaining
	 */
	public function group_by( $attribute )
	{
		$new = new self();

		for ( $i = 0; $i < count( $this ); ++$i ) {

			$key = (string)$this[$i]->$attribute;

			if ( ! isset( $new[$key] ) )
				$new[$key] = new self();

			$new[$key][] = $this[$i];

		}

		return $new;
	}

	/**
	 * Returns json string.
	 *
	 * @param string
	 */
	public function to_json()
	{
		return json_encode( $this );
	}

	/**
	 * Returns string.
	 *
	 * @param string
	 */
	public function __toString()
	{
		return $this->to_json();
	}
}
