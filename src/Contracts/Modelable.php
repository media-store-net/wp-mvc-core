<?php

namespace MediaStoreNet\MVC_Core\Contracts;

/**
 * Represents an interface to define common database operations
 * such as loading, saving, and deleting a model.
 */
interface Modelable
{
	/**
	 * Loads model from db.
	 */
	public function load( $id );

	/**
	 * Saves current model in the db.
	 *
	 * @return mixed.
	 */
	public function save();

	/**
	 * Deletes current model in the db.
	 *
	 * @return mixed.
	 */
	public function delete();
}
