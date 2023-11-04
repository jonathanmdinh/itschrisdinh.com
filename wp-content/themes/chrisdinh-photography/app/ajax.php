<?php
namespace App;

class Ajax {
    public function __construct() {
        add_action('wp_ajax_handle_filtering_gallery', [$this, 'handle_filtering_gallery']);
        add_action('wp_ajax_nopriv_handle_filtering_gallery', [$this, 'handle_filtering_gallery']);
    }

    public function handle_filtering_gallery() {
        $data = json_decode( file_get_contents('php://input'), true );
        $returnData = [];

        if ( is_array($data) && array_key_exists('data', $data) ) {
            $fetchData = $data['data'];

            // Will hold the new array of posts if any
            $posts = [];

            if ( !empty($fetchData['termSlug']) ) {
                // Build our query so we can get all gallery items that match a specific filter (taxonomy)
                $wpQueryArgs = [
                    'post_type' => 'gallery_items',
                    'post_status' => 'publish',
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                    'tax_query' => [
                        [
                            'taxonomy' => 'collection',
                            'field' => 'slug',
                            'terms' => $fetchData['termSlug']
                        ]
                    ],
                    'posts_per_page' => -1
                ];

                $query = new \WP_Query($wpQueryArgs);

                if ( $query->have_posts() ) {
                    $posts = $query->posts;
                }

                wp_reset_postdata();

                // Create our return data so the front end can show the filtered posts
                if ( !empty($posts) ) {
                    foreach ( $posts as $post ) {
                        array_push($returnData, [
                            'imageUrl' => get_the_post_thumbnail_url($post->ID, 'full'),
                            'imageAlt' => get_post_meta($post->ID, '_wp_attachment_image_alt', TRUE)
                        ]);
                    }
                }
            }
        } else {
            // Our Fetch Data is incorrect. Handle errors
            error_log('Ajax->handle_filtering_gallery() failed - data receieved from sender does not contain correct data');
        }

        echo json_encode($returnData);
        die();
    }
}

new Ajax;
?>
