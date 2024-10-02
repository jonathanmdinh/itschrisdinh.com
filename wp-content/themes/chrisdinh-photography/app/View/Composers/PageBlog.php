<?php
namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageBlog extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'page-blog',
    ];

    /**
     * Get Term ID for collections
     */
    private function getFeaturedCollection() {
        $featuredCollection = get_field('blog__featured-blog-collection');

        return $featuredCollection;
    }

    private function getOtherBlogCollections() {
        $otherBlogCollections = get_field('blog__other-blog-collections');

        return $otherBlogCollections;
    }

    /**
     * Get the collection settings.
     */

    private function getFeaturedCollectionSettings() {
        $featuredCollectionSettings = get_field('blog__featured-slide-settings');

        return $featuredCollectionSettings;
    }

    private function getOtherCollectionSettings() {
        $otherCollectionSettings = get_field('blog__other-slide-settings');

        return $otherCollectionSettings;
    }

    private function getAllOtherCollectionPosts() {
        $otherBlogCollections = $this->getOtherBlogCollections();

        $collectionPosts = [];

        error_log(print_r($otherBlogCollections, true));

        if (!empty($otherBlogCollections) && is_array($otherBlogCollections)) {
            foreach ($otherBlogCollections as $collection) {
                // $termName = get_term( $collection )->taxonomy;

                $collectionPosts[] = [
                    'posts' => $this->getAllPostsFromCollection($collection['collection']->term_id),
                    'title' => $collection['collection']->name,
                ];
            }
        }

        return $collectionPosts;
    }

    private function getAllPostsFromCollection($collectionId) {
        $args = array(
            'post_type' => 'blog',
            'numberposts' => -1,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'blog-collection',
                    'field' => 'term_id',
                    'terms' => $collectionId,
                ),
            ),
        );

        $posts = get_posts($args);

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
            // 'featuredCollection' => $this->getFeaturedCollection(),
            // 'otherBlogCollections' => $this->getOtherBlogCollections(),
            'featuredCollection' => $this->getAllPostsFromCollection($this->getFeaturedCollection()),
            'otherBlogCollections' => $this->getAllOtherCollectionPosts(),
            'featuredCollectionSettings' => $this->getFeaturedCollectionSettings(),
            'otherCollectionSettings' => $this->getOtherCollectionSettings(),
            'test' => $this->getOtherBlogCollections()
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
