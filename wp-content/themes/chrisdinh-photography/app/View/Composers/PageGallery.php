<?php
namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageGallery extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-gallery',
    ];

    private function getGalleryItems() {
        $posts = get_posts([
            'post_type' => 'gallery_items',
            'post_status' => 'publish',
            'posts_per_page' => -1
        ]);

        return $posts;
    }

    private function getThumbnailSliderSettings() {
        $thumbnailSliderSettings = get_field('gallery__thumbnail-slider-settings');

        return $thumbnailSliderSettings;
    }

    private function getMainSliderSettings() {
        $mainSliderSettings = get_field('gallery__main-slider-settings');

        return $mainSliderSettings;
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'siteName' => $this->siteName(),
            'galleryItems' => $this->getGalleryItems(),
            'thumbnailSliderSettings' => $this->getThumbnailSliderSettings(),
            'mainSliderSettings' => $this->getMainSliderSettings()
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
