<li class="splide__slide">
    <div class="lg:max-h-[90vh] w-full h-full flex flex-col justify-center items-center">
        <picture class="w-full h-full">
            <img
                src="{{ $data['url'] }}"
                alt="{{ $data['alt'] }}"
                class="gallery-main-slide w-full h-auto relative"
                data-width="{{ $data['width'] }}"
                data-height="{{ $data['height'] }}"
                >
        </picture>
    </div>
</li>
