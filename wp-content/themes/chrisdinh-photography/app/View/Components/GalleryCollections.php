<?php
namespace App\View\Components;

use Roots\Acorn\View\Component;

class GalleryCollections extends Component {
    public $collectionSlug = '';
    public $terms = [];

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($collectionSlug = 'collection') {
        $this->collectionSlug = $collectionSlug;
        $this->terms = get_terms([
            'taxonomy' => $this->collectionSlug,
            'hide_empty' => false
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.gallery-collections');
    }
}
