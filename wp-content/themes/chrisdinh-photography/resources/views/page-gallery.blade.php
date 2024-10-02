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
        <section class="max-w-7xl mx-auto px-5 pb-[100px]">
            <div id="gallery" data-nanogallery2='{"thumbnailHeight": 300, "thumbnailWidth": "auto", "galleryFilterTags": true,
          "galleryFilterTagsMode": "multiple", "galleryDisplayTransitionDuration": 1000,
          "thumbnailDisplayTransition": "slideRight",
          "thumbnailDisplayTransitionDuration": 300,
          "thumbnailDisplayInterval": 150,
          "thumbnailDisplayOrder": "colFromRight"}'>
                @foreach ($galleryItems as $index => $item)
                    <a
                        data-ngtags="{{ $item['taxonomy_terms'] }}"
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
