<!--front-end view of the slider component-->
<!--run yarn build/dev before coding to implement new tailwind code-->
@unless ( empty($data) )
    <!--parent container of the slider -->
    <!--uses splidejs.com, read the documentation-->
    <!--
    <section id="{{ $sliderSettings['slider__id'] }}"  class="fixed top-0 left-0 z-0 w-screen h-screen splider splide"-->
    <section id="{{ $sliderSettings['slider__id'] }}"  class="relative z-0 w-screen h-screen splider splide"
        data-type="{{ $sliderSettings['slider__type'] }}"
        data-speed="{{ implode(',', $sliderSettings['slider__speed'])  }}"
        data-width="{{ implode(',', $sliderSettings['slider__width']) }}"
        data-height="{{ implode(',', $sliderSettings['slider__height']) }}"
        data-per-page="{{ implode(',', $sliderSettings['slider__per-page']) }}"
        data-per-move="{{ implode(',', $sliderSettings['slider__per-move']) }}"
        data-gap="{{ implode(',', $sliderSettings['slider__gap']) }}"
        data-arrows="{{ implode(',', $sliderSettings['slider__arrows']) }}"
        data-pagination="{{ implode(',', $sliderSettings['slider__pagination']) }}"
    >
        <div class="relative ">
            <div class="flex justify-center items-center">
                <div class="splide__arrows">
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
                <div class="splide__pagination text-white"></div>
            </div>
            <!--handles camera-effect and inner-box-->
            <div class="absolute inset-0 z-5">
                <!-- Outer Divs -->
                <div class="absolute top-0 left-0 w-1/4 h-1/4  flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
                <div class="absolute top-0 left-1/4 w-1/4 h-1/4 flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
                <div class="absolute top-0 left-1/2 w-1/2 h-1/4 flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
                <div class="absolute top-1/4 left-0 w-1/4 h-1/2 flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
                <!-- Center Div -->
                <div class="absolute top-1/4 left-1/4 w-1/2 h-1/2 border border-white flex items-center justify-center">
                    <div class="w-20 h-20 border border-white rounded-full"></div>
                </div>
                <!-- More Outer Divs -->
                <div class="absolute top-1/4 right-0 w-1/4 h-1/2 flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
                <div class="absolute bottom-0 left-0 w-1/2 h-1/4 flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
                <div class="absolute bottom-0 left-1/2 w-1/4 h-1/4 flex items-center justisfy-center bg-black backdrop-blur-lg opacity-25"></div>
                <div class="absolute bottom-0 right-0 w-1/4 h-1/4 flex items-center justify-center bg-black backdrop-blur-lg opacity-25"></div>
            </div>
        <div>
    </section>
@endunless
