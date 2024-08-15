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
        <section class="max-w-6xl mx-auto px-5 pb-20">
            <div id="gallery" data-nanogallery2='{"thumbnailHeight": 300, "thumbnailWidth": "auto"}'>
                @foreach ($galleryItems as $index => $item)
                    <a
                        data-index="{{ $index }}"
                        href="{{ $item['url'] }}"
                        data-ngthumb="{{ $item['url'] }}">
                        {{ !empty($item['alt']) ? $item['alt'] : '' }}
                    </a>
                @endforeach
            </div>
        </section>
    @endunless

    @include('components.back-to-top')
@endsection
