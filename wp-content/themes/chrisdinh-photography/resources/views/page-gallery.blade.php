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
            @foreach ($galleryItems as $item)
                <div class="gallery-item__image block overflow-hidden cursor-pointer">
                    <img src="{{ get_the_post_thumbnail_url($item->ID, 'full') }}" alt="{{ get_post_meta($item->ID, '_wp_attachment_image_alt', TRUE) }}" class="relative object-cover block transition-all duration-1000 w-full h-full">
                </div>
            @endforeach
        </section>
    @endunless

    @include('components.back-to-top');

@endsection
