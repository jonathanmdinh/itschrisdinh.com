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

        if ( is_array($allItems) && !empty($allItems) ) {
            foreach ($allItems as $item) {
                $terms = get_the_terms($item['ID'], 'collection');

                // If we have any collections set, add them to our new items array
                if ( is_array($terms) && !empty($terms) && !is_wp_error($terms) ) {
                    $allTerms = array_column($terms, 'slug');
                    $allTermsTitle = array_column($terms, 'name');

                    if ( !empty($allTerms) ) {
                        $item['taxonomy_terms'] = implode(',', $allTerms);
                    } else {
                        $item['taxonomy_terms'] = '';
                    }

                    if ( !empty($allTermsTitle) ) {
                        $item['taxonomy_terms_name'] = implode(',', $allTermsTitle);
                    } else {
                        $item['taxonomy_terms_name'] = '';
                    }
                }

                array_push($items, $item);
            }
        }

        return $items;
    }

    private function nanoGallerySettings() {
        $settings = [
            'thumbnailHeight' => 300,
            'thumbnailWidth' => 'auto',
            'galleryFilterTags' => true,
            'galleryFilterTagsMode' => 'single',
            'galleryDisplayTransitionDuration' => 1000,
            'thumbnailDisplayTransition' => 'slideRight',
            'thumbnailDisplayTransitionDuration' => 300,
            'thumbnailDisplayInterval' => 150,
            'thumbnailDisplayOrder' => 'colFromRight'
        ];

        return json_encode($settings);
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
            'mainSliderSettings' => $this->getMainSliderSettings(),
            'nanoGallerySettings' => $this->nanoGallerySettings()
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
