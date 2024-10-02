@extends('layouts.app')

@section('content')
    <header class="gallery-header relative max-w-7xl mx-auto px-5 pb-10 flex flex-col md:flex-row items-center">
        <div class="gallery-header__heading basis-1/3">
            <h1 class="block text-left font-neueHaas font-normal text-6xl tracking-[7px]">Blog</h1>
        </div>
    </header>

    @if (!empty($featuredCollection))
        <section class="blog-featured-collection relative max-w-7xl mx-auto px-5">
            <div class="blog-featured-collection__header">
                <h2 class="blog-featured-collection__title text-4xl pb-5 font-neueHaas">Featured Collection</h2>
            </div>

            <x-slider
                slider-settings-acf-name="blog__featured-slide-settings"
                slide-view-template-path="components.featured-collection-slide"
                :slide-view-template-data="$featuredCollection"
                >
            </x-slider>

            <hr class="blog-featured-collection__divider h-[2px] w-70% mx-auto block bg-white my-20">
        </section>
    @endif

    @if (!empty($otherBlogCollections))
        @foreach ($otherBlogCollections as $collection)
            <section class="blog-other-collections relative max-w-7xl mx-auto px-5 pb-10 lg:pb-20">
                <div class="blog-other-collections__header pb-5">
                    <h2 class="blog-other-collections__title text-4xl font-neueHaas">{{ $collection['title'] }}</h2>
                </div>

                <x-slider
                    slider-settings-acf-name="blog__other-slide-settings"
                    slide-view-template-path="components.other-collection-slide"
                    :slide-view-template-data="$collection['posts']"
                    >
                </x-slider>
            </section>
        @endforeach
    @endif
@endsection
