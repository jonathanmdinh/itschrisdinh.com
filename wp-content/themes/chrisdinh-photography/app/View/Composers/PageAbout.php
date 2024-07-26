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
            'bio' => $this->getBio(),
            'articleSections' => $this->getArticleSections(),
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

    private function getBio() {
        return get_field('bio');
    }

    private function getArticleSections() {
        $sections = [];
        if (have_rows('about__article-section')) {
            while (have_rows('about__article-section')) {
                the_row();
                $sections[] = [
                    'title' => get_sub_field('about__section-title'),
                    'text' => get_sub_field('about__section-text'),
                ];
            }
        }
        return $sections;
    }
}
