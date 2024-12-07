<li class="splide__slide relative flex items-center justify-center">
    <picture class="block relative w-full h-full">
        <source srcset="{{ wp_get_attachment_image_srcset( $data['homepage__slide-image-desktop']['ID'] ) }}" media="(min-width: 50em)">
        <source srcset="{{ wp_get_attachment_image_srcset( $data['homepage__slide-image-mobile']['ID'] ) }}">
        <img alt="{{ $data['homepage__slide-image-mobile']['alt'] }}" class="w-full h-full object-cover object-center">
    </picture>
</li>
