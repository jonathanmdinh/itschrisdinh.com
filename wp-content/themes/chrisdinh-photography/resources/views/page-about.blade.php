@extends('layouts.app')

@section('content')
    <header class="about-header relative max-w-7xl mx-auto px-5 flex flex-col items-center py-10">
        <div class="about-header__heading basis-full lg:basis-1/3 py-5 flex justify-center">
            <h1 class="block text-center font-neueHaas font-normal text-4xl lg:text-6xl tracking-[7px]">{{ $pageTitle }}</h1>
        </div>

        <div class="about-header__profile-pic basis-full lg:basis-1/3 py-5 flex justify-center">
          <img src="{{ $profilePicture['url'] }}" alt="{{ $profilePicture['alt'] }}" class="w-40 h-40 lg:w-[350px] lg:h-[350px] rounded-full mx-auto mb-4">
      </div>

        <div class="about-header__bio basis-full lg:basis-1/3 py-5 text-center flex flex-col items-center">
            <p class="text-2xl lg:text-3xl text-white tracking-[2px]">{{ $fullName }}</p>
            <p class="text-2xl lg:text-3xl text-white tracking-[2px]">{{ $occupation }}</p>
        </div>
    </header>



    <div class="mx-auto max-w-7xl px-5">
        <hr class="border-t-1 border-white w-full my-24 mx-auto max-w-7xl">
        <div class = "article-content">
            {!! $postContent !!}
        </div>
    </div>



@endsection
