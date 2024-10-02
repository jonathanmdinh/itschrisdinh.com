<li class="splide__slide">
    <a href="{{ get_the_permalink($item->ID) }}">
        <div class="w-full h-auto flex flex-col justify-center items-center mx-auto">
            <picture class="w-full h-full">
                @php
                    $imageSizes = wp_getimagesize(get_the_post_thumbnail_url($item->ID, 'full'));
                @endphp
                <img
                    src="{{ get_the_post_thumbnail_url($data->ID, 'full') }}"
                    alt="{{ get_post_meta($data->ID, '_wp_attachment_image_alt', TRUE) }}"
                    class="max-w-[900px] w-full h-auto relative mx-auto pb-2.5"
                    data-width="{{ $imageSizes[0] }}"
                    data-height="{{ $imageSizes[1] }}"
                    >
            </picture>
            @if (!empty($item->post_title))
                <h2 class="text-white text-center text-5xl font-neueHaas">{{ $item->post_title }}</h2>
            @endif
        </div>
    </a>
</li>
