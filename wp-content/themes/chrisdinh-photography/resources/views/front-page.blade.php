<!--front-end view of the homepage-->
<!--read sage doc on blade-->
<!--use tailwind classes in html of front-page.blade.php / slider.blade.php-->

@extends('layouts.app')

@section('content')

  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile

  @unless ( empty($slides) && empty($sliderSettings) )
  <pre>
    @dump($sliderSettings)
  </pre>
    @include('components.slider', ['data' => $slides, 'settings' => $sliderSettings])
    @if (get_field('slider__show-camera-effect'))
        @include('components.camera-effect')
    @endif
  @endunless
@endsection
