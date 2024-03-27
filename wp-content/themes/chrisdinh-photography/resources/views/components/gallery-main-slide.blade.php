<li class="splide__slide">
    <div class="lg:max-h-[90vh] flex flex-col justify-center items-center">
        <picture class="w-full h-auto">
            <img
                src="{{ get_the_post_thumbnail_url($data->ID, 'full') }}"
                alt="{{ get_post_meta($data->ID, '_wp_attachment_image_alt', TRUE) }}"
                class="relative w-full h-full object-cover md:object-fill md:h-auto md:max-w-[90%] mx-auto"
                >
        </picture>
        <div class="gallery-main-slider__meta-data pt-5">
            @unless ( empty(get_the_excerpt($data->ID)) )
                <p class="gallery-main-slider__description text-white text-center">{{ get_the_excerpt($data->ID) }} </p>
            @endunless
        </div>
    </div>
</li>
