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
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'pageTitle' => $this->getPageTitle(),
            'profilePicture' => $this->getProfilePicture(),
            'fullName' => $this->getFullName(),
            'occupation' => $this->getOccupation(),
            'postContent' => $this->getPostContent(),
        ];
    }

    private function getPageTitle() {
        return get_field('about__page-title');
    }

    private function getProfilePicture() {
        return get_field('about__profile-picture');
    }

    private function getFullName() {
        return get_field('about__biographical-information')['about__full-name'];
    }

    private function getOccupation() {
        return get_field('about__biographical-information')['about__occupation'];
    }

    private function getPostContent() {
        return apply_filters('the_content', get_post_field('post_content', get_the_ID()));
    }
}
