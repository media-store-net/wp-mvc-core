<?php

namespace MediaStoreNet\MVC_Core;

/**
 * Abstract Controller class that provides common functionalities for controllers.
 */
abstract class Controller
{
	/**
	 * Logged user reference.
	 * @var object
	 */
	protected $user;

	/**
	 * View class object.
	 * @var object
	 */
	protected $view;

	/**
	 * Default construct.
	 *
	 * @param object $view View class object.
	 */
	public function __construct( $view )
	{
        if(!function_exists('get_userdata')){
            require_once ABSPATH . '/wp-includes/pluggable.php';
        }
		$this->user = \get_userdata( get_current_user_id() );
		$this->view = $view;
	}
}
