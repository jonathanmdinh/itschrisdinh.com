<?php
namespace App;

class Ajax {
    public function __construct() {
        add_action('wp_ajax_handle_filtering_gallery', [$this, 'handle_filtering_gallery']);
        add_action('wp_ajax_nopriv_handle_filtering_gallery', [$this, 'handle_filtering_gallery']);
    }

    public function handle_filtering_gallery() {
        $data = $_POST;

        error_log( print_r($data, true) );

        echo json_encode($data);
        die();
    }
}

new Ajax;
?>
