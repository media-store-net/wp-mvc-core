<?php

namespace MediaStoreNet\MVC_Core;

/**
 * Handles rendering and displaying of views.
 */
class View
{
	/**
	 * Path to where controllers are.
	 * @var string
	 */
	protected $views_path;

	/**
 	 * Default engine constructor.
 	 *
 	 * @param string $controllers_path
 	 * @param string $namespace
	 */
	public function __construct( $views_path )
	{
		$this->views_path = $views_path;
	}

	/**
	 * Returns view with the parameters passed by.
	 *
	 * @param string $view   Name and location of the view within "theme/views" path.
	 * @param array  $params View parameters passed by.
	 *
	 * @return string
	 */
	public function get( $view, $params = array() )
	{
		$template = preg_replace( '/\./', '/', $view );

        $child_path = get_stylesheet_directory() . '/views/' . $template . '.php';

		$theme_path =  get_template_directory() . '/views/' . $template . '.php';

		$plugin_path = $this->views_path . $template . '.php';

        if (is_readable($child_path)):
            $path = $child_path;
        elseif (is_readable($theme_path)):
            $path = $theme_path;
        elseif (is_readable($plugin_path)):
            $path = $plugin_path;
        else:
            $path = null;
        endif;

		if ( ! empty( $path ) ) {
			extract( $params );
			ob_start();
			include( $path );
			return ob_get_clean();
		} else {
			return;
		}
	}

	/**
	 * Displays view with the parameters passed by.
	 *
	 * @param string $view   Name and location of the view within "theme/views" path.
	 * @param array  $params View parameters passed by.
	 */
	public function show( $view, $params = array() )
	{
		echo $this->get( $view, $params );
	}
}
