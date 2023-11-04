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
        <section class="gallery-items max-w-7xl mx-auto relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 px-5">
            @foreach ($galleryItems as $item)
                <div class="gallery-item__image block overflow-hidden cursor-pointer">
                    <img src="{{ get_the_post_thumbnail_url($item->ID, 'medium') }}" alt="{{ get_post_meta($item->ID, '_wp_attachment_image_alt', TRUE) }}" class="relative object-cover block h-full w-full transition-all duration-1000">
                </div>
            @endforeach
        </section>
    @endunless

    <div class="gallery__back-to-top-container fixed left-1/2 bottom-[50px] -translate-x-1/2">
        <button class="gallery__back-to-top hover:opacity-50 transition-all" aria-label="Smooth scroll the page back to the top">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
            </svg>
            <span class="text-white font-neueHaas text-sm tracking-[2px]">Back to Top</span>
        </button>
    </div>

@endsection
