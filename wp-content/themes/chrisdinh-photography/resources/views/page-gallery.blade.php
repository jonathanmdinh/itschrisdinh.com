@extends('layouts.app')

@section('content')
    <header class="gallery-header relative max-w-7xl mx-auto px-5 flex flex-col items-start">
        <div class="gallery-header__heading basis-full py-5">
            <h1 class="block text-left font-neueHaas font-normal text-6xl tracking-[7px]">Gallery</h1>
        </div>

        <div class="gallery-header__filters basis-full">
            <div class="gallery-collections block relative mx-auto pb-5 lg:py-7">
                <p class="gallery-collections__description mb-4 text-grey tracking-[2px] w-full">Use the filters below to sort the images. Click on an image to take a closer look.</p>
            </div>
        </div>
    </header>

    @unless ( empty($galleryItems) )
        <section class="max-w-7xl mx-auto px-5 pb-[100px]">
            <div id="gallery" data-nanogallery2="{{ $nanoGallerySettings }}">
                @foreach ($galleryItems as $index => $item)
                    <a
                        data-ngtags="{{ !empty($item['taxonomy_terms']) ? $item['taxonomy_terms'] : '' }}"
                        data-index="{{ $index }}"
                        href="{{ $item['url'] }}"
                        data-ngthumb="{{ !empty($item['sizes']['large']) ? $item['sizes']['large'] : $item['url'] }}">
                    </a>
                @endforeach
            </div>
        </section>
    @endunless


    @unless ( empty($galleryItems) )
        <section class="max-w-7xl mx-auto px-5 pb-[100px]">
            <div id="gallery-test" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($galleryItems as $index => $item)
                    <div class="gallery-test__item group cursor-pointer overflow-hidden">
                        <img
                            data-index="{{ $index }}"
                            src="{{ $item['url'] }}"
                            alt="{{ $item['alt'] }}"
                            data-width="{{ $item['width'] }}"
                            data-height="{{ $item['height'] }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-all duration-300 ease"
                            >
                    </div>
                @endforeach
            </div>
        </section>
    @endunless

    <div class="overlay fixed w-full h-full top-0 left-0 opacity-0 -z-1 transition-all duration-300 ease">
        <div class="overlay__navigate overlay__prev absolute top-1/2 cursor-pointer h-3/4 w-[100px] flex justify-center items-center left-0 -translate-y-1/2 z-[51] hover:opacity-50 transition-all duration-300 ease">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-[30px] h-[30px] stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </div>

        <button class="overlay__close absolute top-5 right-5 text-black z-[51]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30px] h-[30px] inline-block stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="image-container bg-black transition-all duration-1000 ease relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="width:1000px;height:700px;">
            <img class="overlay__image">
            <p class="overlay__image-description text-white pt-2.5 text-[12px] leading-[12px] tracking-[2px] opacity-0">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
            </p>
        </div>

        <div class="overlay__navigate overlay__next absolute top-1/2 cursor-pointer h-3/4 w-[100px] flex justify-center items-center right-0 -translate-y-1/2 z-[51] hover:opacity-50 transition-all duration-300 ease">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-[30px] h-[30px] stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </div>
    </div>

    @include('components.back-to-top')
@endsection
