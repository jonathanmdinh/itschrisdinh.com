@extends('layouts.app')

@section('content')
    <header class="about-header relative max-w-7xl mx-auto px-5 flex flex-col items-center py-10">
        <div class="about-header__heading basis-1/3 py-5">
            <h1 class="block text-center font-neueHaas font-normal text-6xl tracking-[7px]">{{ $pageTitle }}</h1>
        </div>

        <div class="about-header__profile-pic basis-1/3 py-5">
            <img src="{{ $profilePicture['url'] }}" alt="{{ $profilePicture['alt'] }}" class="w-80 h-80 rounded-full mx-auto mb-4">
        </div>

        <div class="about-header__bio basis-1/3 py-5 text-center">
            <p class="text-3xl text-white">{{ $fullName }}</p>
            <p class="text-3xl text-white">{{ $occupation }}</p>
            <hr class="border-t-2 border-white mx-72 my-4">
        </div>
    </header>

    <div class="prose lg:prose-xl mb-8 text-center">
        {!! $bio !!}
    </div>

    <div class="mt-12">
      @foreach ($articleSections as $section)
        <div class="mb-8 mx-72">
          <h2 class="text-2xl font-light mb-4 text-white">{{ $section['title'] }}</h2>
          <p class="text-white font-light">{{ $section['text'] }}</p>
        </div>
      @endforeach
    </div>
@endsection
