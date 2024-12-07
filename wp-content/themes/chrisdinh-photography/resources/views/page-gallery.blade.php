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

    @include('components.back-to-top')
@endsection
