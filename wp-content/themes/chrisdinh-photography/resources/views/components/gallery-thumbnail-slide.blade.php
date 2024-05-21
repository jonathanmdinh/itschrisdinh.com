<li class="splide__slide">
    <picture class="max-w-[100px] max-h-auto">
        <img src="{{ get_the_post_thumbnail_url($data->ID, 'full') }}" alt="{{ get_post_meta($data->ID, '_wp_attachment_image_alt', TRUE) }}" class="w-full h-full object-cover">
    </picture>
</li>
