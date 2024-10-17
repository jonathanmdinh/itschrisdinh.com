<li class="splide__slide">
    <a href="{{ get_the_permalink($item->ID) }}" class="group">
        <div class="w-full h-auto flex flex-col justify-center items-center mx-auto">
            <picture class="w-full h-full block pb-2.5 relative">
                <div class="picture-overlay bg-[rgba(0,0,0,0.5)] w-full h-full absolute top-0 left-0 z-[2] group-hover:opacity-1 transition-all duration-300"></div>
                @php
                    $imageSizes = wp_getimagesize(get_the_post_thumbnail_url($item->ID, 'full'));
                @endphp
                <img
                    src="{{ get_the_post_thumbnail_url($data->ID, 'full') }}"
                    alt="{{ get_post_meta($data->ID, '_wp_attachment_image_alt', TRUE) }}"
                    class="w-full h-auto relative mx-auto"
                    data-width="{{ $imageSizes[0] }}"
                    data-height="{{ $imageSizes[1] }}"
                    >
            </picture>
            @if (!empty($item->post_title))
                <h2 class="text-white text-left text-2xl font-neueHaas w-full pb-1">{{ $item->post_title }}</h2>
            @endif
            @if (!empty($item->post_date))
                <p class="text-white text-left text-sm font-neueHaas w-full">{{ date('F j, Y', strtotime($item->post_date)) }}</p>
            @endif
        </div>
    </a>
</li>
