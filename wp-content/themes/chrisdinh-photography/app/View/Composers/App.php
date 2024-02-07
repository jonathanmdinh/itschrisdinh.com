<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'menuItems' => $this->menuItems(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Fetch menu items from the 'primary_navigation' menu if it exists. If not, return an empty array.
     *
     * @return array
     */
    protected function menuItems()
    {
        // Ensure the function exists to prevent errors in non-WordPress contexts
        if (function_exists('has_nav_menu') && function_exists('wp_get_nav_menu_items')) {
            return has_nav_menu('primary_navigation') ? wp_get_nav_menu_items('primary_navigation') : [];
        }

        return [];
    }
}
