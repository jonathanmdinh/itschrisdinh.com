<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

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
            'sliderSettings' => $this->getHomepageSliderSettings()
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
