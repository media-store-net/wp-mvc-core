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
        $user_id = 0;

        if (!defined('ABSPATH')) {
            require_once dirname(__FILE__, 5) . '/wp-load.php';
        }

        if (is_multisite()) {
            /**
             * @since 2.5.0
             */
            if (! defined('AUTH_COOKIE') || ! defined('SECURE_AUTH_COOKIE')) {
                require_once ABSPATH . '/wp-includes/default-constants.php';
                wp_cookie_constants();
            }
        }

        require_once ABSPATH . '/wp-includes/user.php';
        require_once ABSPATH . '/wp-includes/pluggable.php';

        $user_id = \get_current_user_id();

        if ($user_id) {
            $this->user = \get_userdata($user_id);
        }

        $this->view = $view;
	}
}
