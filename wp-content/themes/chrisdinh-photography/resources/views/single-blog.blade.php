@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single', ['data' => [
        'featuredImage' => $featuredImage,
        'relatedArticles' => $relatedArticles
    ]]])
  @endwhile
@endsection
