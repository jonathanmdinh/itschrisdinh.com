@extends('layouts.app')

@section('content')
    <header class="gallery-header relative max-w-7xl mx-auto px-5 flex flex-col md:flex-row items-center">
        <div class="gallery-header__heading basis-1/3 py-5">
            <h1 class="block text-left font-neueHaas font-normal text-6xl tracking-[7px]">Gallery</h1>
        </div>

        <div class="gallery-header__filters basis-2/3">
            <x-gallery-collections class=""></x-gallery-collections>
        </div>
    </header>

    @unless ( empty($galleryItems) )
        <section class="gallery-items max-w-7xl mx-auto relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 grid-rows-gallery gap-4 px-5 pb-20">
            <div class="gallery-items__overlay absolute h-full w-full bg-black transition-all duration-700"></div>
            @foreach ($galleryItems as $index => $item)
                <div class="gallery-item__image block overflow-hidden cursor-pointer">
                    <img data-index="{{ $index }}" src="{{ get_the_post_thumbnail_url($item->ID, 'full') }}" alt="{{ get_post_meta($item->ID, '_wp_attachment_image_alt', TRUE) }}" class="relative object-cover block transition-all duration-1000 w-full h-full">
                </div>
            @endforeach
        </section>
    @endunless

    @include('components.back-to-top')

    <div class="gallery-popup fixed h-screen w-screen bg-black opacity-0 flex justify-center items-center top-0 left-0 right-0 bottom-0 -z-1 transition-all duration-300">
        <button class="gallery-popup__close absolute top-10 right-10" title="Close popup">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="max-w-[90%] mx-auto flex flex-col md:flex-row flex-wrap justify-center items-center gap-y-5 md:gap-y-0">
            <div class="order-2 w-full md:w-1/5 md:order-1">
                <x-slider
                    slider-settings-acf-name="gallery__thumbnail-slider-settings"
                    slide-view-template-path="components.gallery-thumbnail-slide"
                    :slide-view-template-data="$galleryItems"
                    >
                </x-slider>
            </div>
            <div class="order-1 w-full md:w-4/5 md:order-2">
                <x-slider
                    slider-settings-acf-name="gallery__main-slider-settings"
                    slide-view-template-path="components.gallery-main-slide"
                    :slide-view-template-data="$galleryItems"
                    >
                </x-slider>
            </div>
        </div>
    </div>
@endsection
