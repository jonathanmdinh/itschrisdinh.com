<slider>
    <section
        id="{{ $sliderSettings['slider__id'] }}"
        class="{{ $sliderSettings['slider__classes'] }} splider splide"
        data-splide="{{ json_encode($sliderAcfJSONData) }}"
        @if ($sliderSettings['slider__custom-pagination'])
            data-custom-pagination="<?= $sliderSettings['slider__custom-pagination'] ? 'true' : 'false'; ?>"
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

            <div class="splide__custom-pagination text-center bottom-2 left-0 px-0 py-4 absolute right-0 z-1 text-white {{ $customPaginationShowOn }}"></div>
            <div class="splide__pagination text-white"></div>
        </div>
        @if ($sliderSettings['slider__show-camera-effect'])
            @include('components.camera-effect')
        @endif
    </section>
</slider>
