@php
    $paginationSettings = $sliderSettings['slider__pagination'];
    $paginationValues = [
        $paginationSettings['mobile_pagination'] ? 'true' : 'false',
        $paginationSettings['tablet_pagination'] ? 'true' : 'false',
        $paginationSettings['desktop_pagination'] ? 'true' : 'false',
    ];

    $arrowSettings = $sliderSettings['slider__arrows'];
    $arrowValues = [
        $arrowSettings['mobile_arrows'] ? 'true' : 'false',
        $arrowSettings['tablet_arrows'] ? 'true' : 'false',
        $arrowSettings['desktop_arrows'] ? 'true' : 'false',
    ];
@endphp

<slider>
    <section
        id="{{ $sliderSettings['slider__id'] }}"
        class="{{ $sliderSectionClasses }} splider splide"
        data-type="{{ $sliderSettings['slider__type'] }}"
        data-speed="{{ implode(',', $sliderSettings['slider__speed'])  }}"
        data-width="{{ implode(',', $sliderSettings['slider__width']) }}"
        data-height="{{ implode(',', $sliderSettings['slider__height']) }}"
        data-per-page="{{ implode(',', $sliderSettings['slider__per-page']) }}"
        data-per-move="{{ implode(',', $sliderSettings['slider__per-move']) }}"
        data-gap="{{ implode(',', $sliderSettings['slider__gap']) }}"
        data-arrows="{{ implode(',', $sliderSettings['slider__arrows']) }}"
        data-pagination="{{ implode(',', $sliderSettings['slider__pagination'])}}"
        data-mobile-custom-settings="{{ !empty($sliderCustomSettings['mobile']) ? json_encode($sliderCustomSettings['mobile']) : '' }}"
        data-tablet-custom-settings="{{ !empty($sliderCustomSettings['tablet']) ? json_encode($sliderCustomSettings['mobile']) : '' }}"
        data-desktop-custom-settings="{{ !empty($sliderCustomSettings['desktop']) ? json_encode($sliderCustomSettings['desktop']) : '' }}"
        @if ($sliderSettings['slider__custom-pagination'])
            data-custom-pagination="<?php echo get_field('slider__custom-pagination') ? 'true' : 'false'; ?>"
        @endif
        >
        <div class="flex justify-center items-center">
            <div class="splide__arrows z-10">
                <button class="splide__arrow splide__arrow--prev !bg-transparent z-10">
                    <!--using the same svg path because the button is configured to set the svg path backwords for the left button-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="white" class="bi bi-chevron-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/> </svg>
                <button class="splide__arrow splide__arrow--next !bg-transparent z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="white" class="bi bi-chevron-right" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/> </svg>
                </button>
            </div>
            <div class="splide__track justify-center items-center">
                <ul class="splide__list">
                    @foreach ($slideViewTemplateData as $item)
                        @include($slideViewTemplatePath, ['data' => $item])
                    @endforeach
                </ul>
            </div>
            <!--handles color of pagination text-->
            @if ($sliderSettings['slider__custom-pagination'])
                <div class="splide__pagination text-white"></div>
            @endif
        </div>
    </section>
</slider>
<pre>
    @dump($sliderCustomSettings)
</pre>
