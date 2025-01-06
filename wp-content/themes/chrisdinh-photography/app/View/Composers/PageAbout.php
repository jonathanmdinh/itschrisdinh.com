<?php
namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageAbout extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-about',
    ];

    /**
     * Get the page title from ACF.
     *
     * @return string
     */
    private function getPageTitle() {
        return get_field('about__page-title') ?: 'Default Title';
    }

    /**
     * Get the profile picture from ACF.
     *
     * @return array|null
     */
    private function getProfilePicture() {
        return get_field('about__profile-picture');
    }

    /**
     * Get the biographical information from ACF.
     *
     * @return array
     */
    private function getBiographicalInformation() {
        return get_field('about__biographical-information') ?: [
            'about__full-name' => '',
            'about__occupation' => '',
        ];
    }

    /**
     * Get the top biography content from ACF.
     *
     * @return string
     */
    private function getTopBio() {
        return get_field('about__top-bio') ?: '';
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'siteName' => $this->siteName(),
            'pageTitle' => $this->getPageTitle(),
            'profilePicture' => $this->getProfilePicture(),
            'biographicalInformation' => $this->getBiographicalInformation(),
            'topBio' => $this->getTopBio(),
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
