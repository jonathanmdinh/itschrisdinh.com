<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

//backend data fetch for the data that will be displayed on the homepage

class SingleBlog extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single-blog',
    ];

    private function relatedArticles() {
        $post = get_post();
        $associatedTaxonimies = get_post_taxonomies($post);
        $terms = null;

        $returnData = [
            'currentTaxonomy' => '',
            'allPosts' => []
        ];

        if ($post && is_array($associatedTaxonimies) && !empty($associatedTaxonimies)) {
            $terms = get_the_terms($post, $associatedTaxonimies[0]);

            $args = [
                'post_type' => 'blog',
                'tax_query' => [
                    [
                        'taxonomy' => $terms[0]->taxonomy,
                        'field' => 'slug',
                        'terms' => $terms[0]->slug
                    ]
                ]
            ];

            $allPosts = [];

            $query = new \WP_Query( $args );
            if ( $query->have_posts() ) {
                foreach ($query->posts as $relatedPost) {
                    array_push($allPosts, $relatedPost);
                }
            }

            wp_reset_postdata();

            $returnData['currentTaxonomy'] = $terms[0]->name;
            $returnData['allPosts'] = $allPosts;

        }

        return $returnData;
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'siteName' => $this->siteName(),
            'title' => get_the_title(),
            'featuredImage' => wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ),
            'relatedArticles' => $this->relatedArticles()
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
