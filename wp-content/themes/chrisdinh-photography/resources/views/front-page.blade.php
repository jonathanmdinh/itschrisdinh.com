@extends('layouts.app')

@section('content')

  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile

  @unless ( empty($slides) && empty($sliderSettings) )
    <x-slider
        slider-settings-acf-name="homepage__slider-settings"
        slide-view-template-path="components.homepage-slider-slides"
        :slide-view-template-data="$slides">
    </x-slider>
  @endunless
@endsection
