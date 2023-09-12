@extends('layouts.app')

@section('content')
    <header class="gallery-header block relative">
        <h1 class="block text-center uppercase">GALLERY</h1>
    </header>

    <x-gallery-collections></x-gallery-collections>

    @unless ( empty($galleryItems) )
        <section class="gallery-items max-w-7xl mx-auto relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($galleryItems as $item)
                <div class="gallery-item__image block">
                    <img src="{{ get_the_post_thumbnail_url($item->ID, 'medium') }}" alt="Test" class="object-cover block h-auto w-full">
                </div>
            @endforeach
        </section>
    @endunless
@endsection
