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

    public $sliderCustomSettings = [];
    public $sliderAcfJSONData = '';

    // The predefined settings in ACF that can be toggled via the admin. Should be used in the Composer only
    public $acfSliderSettings = [
        'type',
        'rewind',
        'speed',
        'width',
        'height',
        'perPage',
        'perMove',
        'gap',
        'arrows',
        'pagination'
    ];

    // Will contain the classes on which custom pagination will show if any
    public $customPaginationShowOn = '';
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
        $this->sliderSettingsAcfName = $sliderSettingsAcfName; // ACF name that contains the splider settings
        $this->slideViewTemplatePath = $slideViewTemplatePath; // The path to the template that will control how each slide looks
        $this->slideViewTemplateData = $slideViewTemplateData; // The data passed into the view which is then passed to each slide. Should be an array
        $this->acfPostId = $acfPostId;

        $this->sliderSectionClasses = $sliderSectionClasses;
        $this->sliderSettings = get_field( $sliderSettingsAcfName, $acfPostId );

        $this->sliderAcfJSONData = $this->setUpSliderJSONSettings();
        $this->setCustomPaginationViewSettings( $this->sliderSettings['slider__custom-pagination'] );
    }

    /**
     * Creates the array necessary for us to set up splideJS settins via JSON
     */
    private function setUpSliderJSONSettings() {
        $mobileSettings = [];
        $tabletSettings = [];
        $desktopSettings = [];

        if ( !empty($this->sliderSettings) ) {
            foreach ($this->sliderSettings as $settingName => $values) {
                if (in_array($settingName, $this->acfSliderSettings)) {
                    $mobileSettings[$settingName] = $values['mobile'];
                    $tabletSettings[$settingName] = $values['tablet'];
                    $desktopSettings[$settingName] = $values['desktop'];
                }
            }
        }

        $breakpoints = [
            '768' => $mobileSettings,
            '1120' => $tabletSettings,
        ];

        $desktopSettings['breakpoints'] = $breakpoints;

        return $desktopSettings;
    }

    private function setCustomPaginationViewSettings( $customPagination ) {
        if ( !empty($customPagination) ) {
            foreach ($customPagination as $breakpoint => $value) {
                if ($value == true) {
                    $this->customPaginationShowOn .= " $breakpoint:block ";
                } else {
                    $this->customPaginationShowOn .= " $breakpoint:hidden ";
                }
            }
        }
    }

    private function formatCustomSliderSettings() {
        $mobileSliderSettings = [];
        $tabletSliderSettings = [];
        $desktopSliderSettings = [];

        if ( !empty($this->sliderSettings['slider__custom-settings']) ) {
            foreach ( $this->sliderSettings['slider__custom-settings'] as $breakpoint => $settings ) {
                foreach ($settings as $pair => $values) {
                    switch ($breakpoint) {
                        case 'mobile':
                            $mobileSliderSettings[$values['setting_name']] = $values['value'];
                            break;
                        case 'tablet':
                            $tabletSliderSettings[$values['setting_name']] = $values['value'];
                            break;
                        case 'desktop':
                            $desktopSliderSettings[$values['setting_name']] = $values['value'];
                            break;
                    }
                }
            }
        }

        return [
            'mobile' => $mobileSliderSettings,
            'tablet' => $tabletSliderSettings,
            'desktop' => $desktopSliderSettings
        ];
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
