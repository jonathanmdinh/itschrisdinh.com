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
            'contactInformation' => $this->getContactInformation(),
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
        $items = [];

        if (function_exists('has_nav_menu') && function_exists('wp_get_nav_menu_items') && has_nav_menu('primary_navigation')) {
            $menuItems = wp_get_nav_menu_items('primary_navigation');

            foreach ($menuItems as $item) {
                $item->navigation_image = get_field('navigation_image', $item);
                $items[] = $item;
            }
        }

        return $items;
    }

    private function getContactInformation() {
        // Fetch the 'contact_information' group from ACF options
        return get_field('contact_information', 'option');
    }
}
