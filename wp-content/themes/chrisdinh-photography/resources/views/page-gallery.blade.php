@extends('layouts.app')

@section('content')
    <header class="gallery-header relative max-w-7xl mx-auto px-5 flex flex-col items-start">
        <div class="gallery-header__heading basis-full py-5">
            <h1 class="block text-left font-neueHaas font-normal text-6xl tracking-[7px]">Gallery</h1>
        </div>
        <x-gallery-collections class=""></x-gallery-collections>
    </header>


    @unless ( empty($galleryItems) )
        <section class="max-w-7xl mx-auto px-5 pb-[100px]">
            <div id="gallery" class="flex flex-wrap flex-row gap-2.5">
                @foreach ($galleryItems as $index => $item)
                    @php
                        $itemTerm = !empty($item['taxonomy_terms']) ? 'all ' . $item['taxonomy_terms'] : 'all';
                    @endphp
                    <div class="gallery__item basis-[calc(50%-10px)] md:basis-[calc(33.333%-10px)] lg:basis-[calc(25%-10px)] group cursor-pointer overflow-hidden mix" data-collections="{{ $itemTerm }}">
                        <img
                            data-index="{{ $index }}"
                            src="{{ $item['url'] }}"
                            alt="{{ $item['alt'] }}"
                            data-width="{{ $item['width'] }}"
                            data-height="{{ $item['height'] }}"
                            class="w-full h-full aspect-square object-cover group-hover:scale-110 transition-all duration-300 ease"
                            loading="lazy"
                            >
                    </div>
                @endforeach
            </div>
        </section>
    @endunless

    <div class="overlay fixed w-full h-full top-0 left-0 -z-1 transition-all duration-300 ease">
        <button aria-label="Navigate to the previous image in the gallery" class="overlay__navigate overlay__prev absolute top-1/2 cursor-pointer h-3/4 w-[100px] flex justify-center items-center left-0 -translate-y-1/2 z-[51] hover:opacity-50 transition-all duration-300 ease">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-[30px] h-[30px] stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <button class="overlay__close absolute top-5 right-5 text-black z-[51]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30px] h-[30px] inline-block stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="image-container bg-black transition-all duration-1000 ease relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" style="width:1000px;height:700px;">
            <img class="overlay__image">
            <p class="overlay__image-description text-white pt-2.5 text-[12px] leading-[12px] tracking-[2px] transition-all duration-300 ease opacity-0">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.
            </p>
        </div>

        <button aria-label="Navigate to the next image in the gallery" class="overlay__navigate overlay__next absolute top-1/2 cursor-pointer h-3/4 w-[100px] flex justify-center items-center right-0 -translate-y-1/2 z-[51] hover:opacity-50 transition-all duration-300 ease">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-[30px] h-[30px] stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>

    @include('components.back-to-top')
@endsection
