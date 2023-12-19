<!--front-end view of the slider component-->
<!--run yarn build/dev before coding to implement new tailwind code-->
@unless ( empty($data) )
    <!--parent container of the slider -->
    <!--uses splidejs.com, read the documentation-->
    <section id="{{ $sliderSettings['slider__id'] }}"  class="relative w-screen h-screen splider splide"
        data-type="{{ $sliderSettings['slider__type'] }}"
        data-speed="{{ implode(',', $sliderSettings['slider__speed'])  }}"
        data-width="{{ implode(',', $sliderSettings['slider__width']) }}"
        data-height="{{ implode(',', $sliderSettings['slider__height']) }}"
        data-per-page="{{ implode(',', $sliderSettings['slider__per-page']) }}"
        data-per-move="{{ implode(',', $sliderSettings['slider__per-move']) }}"
        data-gap="{{ implode(',', $sliderSettings['slider__gap']) }}"
        @if (get_field('slider__show-arrows'))
            data-arrows="{{ implode(',', $sliderSettings['slider__arrows']) }}"
        @endif
        data-pagination="{{ implode(',', $sliderSettings['slider__pagination']) }}"
        data-custom-pagination="<?php echo get_field('slider__custom-pagination') ? 'true' : 'false'; ?>"
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
                <ul class="splide__list ">
                    @foreach ($data as $item)
                    <!--figure out how to get the 4th image to fill the container -->
                        <li class="splide__slide relative flex items-center justify-center">
                            <picture class="block relative w-full h-auto">
                                <source srcset="{{ wp_get_attachment_image_srcset( $item['homepage__slide-image-desktop']['ID'] ) }}" media="(min-width: 50em)">
                                <source srcset="{{ wp_get_attachment_image_srcset( $item['homepage__slide-image-mobile']['ID'] ) }}">
                                <img alt="{{ $item['homepage__slide-image-mobile']['alt'] }}" class="w-full h-full object-cover object-center">
                            </picture>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--handles color of pagination text-->
            @if (get_field('slider__custom-pagination'))
                <div class="splide__pagination text-white"></div>
            @endif
        </div>
    </section>
@endunless
