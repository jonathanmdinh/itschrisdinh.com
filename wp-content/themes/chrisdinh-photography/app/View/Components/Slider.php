<?php
namespace App\View\Components;

use Roots\Acorn\View\Component;

class Slider extends Component {
    // Variables that become available in the component
    public $sliderSettings = '';
    public $sliderSettingsAcfName = '';
    public $slideViewTemplatePath = '';
    public $slideViewTemplateData = '';
    public $acfPostId = '';
    public $sliderSectionClasses;

    public $sliderAcfJSONData = '';

    /**
     * Create the component instance.
     *
     * @param  string  $sliderSettingsAcfName - The ACF field name that will be used to fetch the data for the specific slider
     * @param  string  $slideViewTemplatePath - The path to the template that will be used in the @include directive. Should follow blade syntax
     * @param  mixed   $slideViewTemplateData - The data that will be passed into the view template of each slide for it to render correctly
     * @param  mixed   $acfPostId - The post ID or WP Post object that can be used to fetch the ACF data for the slider. Defaults to the current post
     * @return void
     */
    public function __construct( $sliderSettingsAcfName, $slideViewTemplatePath, $slideViewTemplateData, $acfPostId = false, $sliderSectionClasses = '' ) {
        $this->sliderSettingsAcfName = $sliderSettingsAcfName;
        $this->slideViewTemplatePath = $slideViewTemplatePath;
        $this->slideViewTemplateData = $slideViewTemplateData;
        $this->acfPostId = $acfPostId;
        $this->sliderSectionClasses = $sliderSectionClasses;
        $this->sliderSettings = get_field( $sliderSettingsAcfName, $acfPostId );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.slider');
    }
}
