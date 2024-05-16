<li class="splide__slide">
    {{-- lg:max-w-[1200px] xl:max-w-[1400px] xxl:max-w-[1700px] --}}
    <div class="lg:max-h-[90vh] w-full h-full flex flex-col justify-center items-center">
        <picture class="w-full h-full">
            @php
                $imageSizes = wp_getimagesize(get_the_post_thumbnail_url($item->ID, 'full'));
            @endphp
            <img
                src="{{ get_the_post_thumbnail_url($data->ID, 'full') }}"
                alt="{{ get_post_meta($data->ID, '_wp_attachment_image_alt', TRUE) }}"
                class="gallery-main-slide w-full h-auto relative"
                data-width="{{ $imageSizes[0] }}"
                data-height="{{ $imageSizes[1] }}"
                >
        </picture>
        <div class="gallery-main-slider__meta-data pt-5">
            @unless ( empty(get_the_excerpt($data->ID)) )
                <p class="gallery-main-slider__description text-white text-center">{{ get_the_excerpt($data->ID) }} </p>
            @endunless
        </div>
    </div>
</li>
