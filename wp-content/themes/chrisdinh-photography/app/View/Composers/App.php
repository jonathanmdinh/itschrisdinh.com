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
            'phoneNumber' => $this->getPhoneNumber(),
            'instagramLink' => $this->getInstagramLink(),
            'emailAddress' => $this->getEmailAddress(),
            'footerClasses' => $this->getFooterClasses(),
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

        /**
     * Fetch the 'contact_information' group from ACF options.
     *
     * @return array|null
     */
    private function getContactInformation()
    {
        return get_field('contact_information', 'option');
    }

    /**
     * Fetch phone number from contact information.
     *
     * @return string|null
     */
    private function getPhoneNumber()
    {
        $contactInformation = $this->getContactInformation();
        return $contactInformation['contact__phone-number'] ?? null;
    }

    /**
     * Fetch Instagram link from contact information.
     *
     * @return string|null
     */
    private function getInstagramLink()
    {
        $contactInformation = $this->getContactInformation();
        return $contactInformation['contact__instagram-link']['url'] ?? null;
    }

    /**
     * Fetch email address from contact information.
     *
     * @return string|null
     */
    private function getEmailAddress()
    {
        $contactInformation = $this->getContactInformation();
        return $contactInformation['contact__email-address'] ?? null;
    }

    /**
     * Determine the footer's CSS classes.
     *
     * @return string
     */
    private function getFooterClasses()
    {
        return is_front_page() ? 'absolute bottom-0 w-full' : 'relative';
    }
}
