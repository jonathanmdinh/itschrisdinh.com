@unless ( empty($data) )
    <section id="{{ $sliderSettings['slider__id'] }}"  class="slider splide relative block w-screen h-screen"
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
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($data as $item)
                    <li class="splide__slide relative">
                        <picture class="block relative w-full h-auto">
                            <source srcset="{{ wp_get_attachment_image_srcset( $item['homepage__slide-image-desktop']['ID'] ) }}" media="(min-width: 50em)">
                            <source srcset="{{ wp_get_attachment_image_srcset( $item['homepage__slide-image-mobile']['ID'] ) }}">
                            <img alt="{{ $item['homepage__slide-image-mobile']['alt'] }}" class="relative w-full h-full object-cover">
                        </picture>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endunless
