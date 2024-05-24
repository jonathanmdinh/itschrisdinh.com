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
        $allItems = get_field('gallery__gallery-images');

        $items = [];

        foreach ($allItems as $item) {
            $terms = get_the_terms($item['ID'], 'collection');

            // If we have any collections set, add them to our new items array
            if ( is_array($terms) && !empty($terms) ) {
                $allTerms = array_column($terms, 'slug');

                $item['taxonomy_terms'] = implode(',', $allTerms);
            }

            array_push($items, $item);
        }

        return $items;
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
