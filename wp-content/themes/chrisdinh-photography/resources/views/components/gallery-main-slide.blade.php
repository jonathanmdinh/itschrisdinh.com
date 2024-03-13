<li class="splide__slide">
    <picture class="w-full h-auto">
        <img src="{{ get_the_post_thumbnail_url($data->ID, 'full') }}" alt="{{ get_post_meta($data->ID, '_wp_attachment_image_alt', TRUE) }}" class="w-full h-full object-cover md:object-fill md:h-auto md:max-h-[800px]">
    </picture>
    <div class="gallery-main-slider__meta-data pt-10">
        @unless ( empty(get_the_excerpt($data->ID)) )
            <p class="gallery-main-slider__description text-white text-center">{{ get_the_excerpt($data->ID) }} </p>
        @endunless
    </div>
</li>
