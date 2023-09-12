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

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'siteName' => $this->siteName(),
            'test' => 'look at that',
            'galleryItems' => $this->getGalleryItems()
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
