<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

//backend data fetch for the data that will be displayed on the homepage

class FrontPage extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'front-page',
    ];

    private function getHomepageSliderData() {
        return get_field('homepage__slides');
    }

    private function getHomepageSliderSettings() {
        return get_field('homepage__slider-settings');
    }

    private function getContactInformation() {
        // Fetch the 'contact_information' group from ACF options
        return get_field('contact_information', 'option');
    }


    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'siteName' => $this->siteName(),
            'test' => 'look at that',
            'slides' => $this->getHomepageSliderData(),
            'sliderSettings' => $this->getHomepageSliderSettings(),
            'contactInformation' => $this->getContactInformation(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName() {
        return get_bloginfo('name', 'display');
    }
}
