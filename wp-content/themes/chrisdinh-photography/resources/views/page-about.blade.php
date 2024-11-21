@extends('layouts.app')

@section('content')
    <div class="flex flex-col xl:flex-row items-center justify-center px-4" style="min-height: calc(100vh - 150px);">
        <div class="w-full p-8 xl:p-32 flex flex-col xl:flex-row gap-8 xl:gap-24">
            <!-- Profile Picture -->
            <div class="flex-shrink-0 self-center">
                <img
                    src="{{ $profilePicture['url'] }}"
                    alt="{{ $profilePicture['alt'] ?? 'Profile Picture' }}"
                    class="aspect-square w-[300px] h-[300px] xl:w-[500px] xl:h-[500px] rounded-full object-cover"
                >
            </div>

            <!-- Content -->
            <div class="flex-grow text-white">
                <!-- Name and Occupation -->
                <div class="text-center xl:text-left">
                    <h1 class="text-4xl xl:text-6xl font-bold">{{ $biographicalInformation['about__full-name'] }}</h1>
                    <p class="text-lg xl:text-2xl mt-2 xl:mt-4">{{ $biographicalInformation['about__occupation'] }}</p>
                </div>

                <!-- Top Bio -->
                <div class="mt-8 xl:mt-12 relative">
                    <!-- Scrollable Content -->
                    <div
                        class="overflow-visible xl:overflow-y-auto xl:max-h-[500px] xl:pr-4"
                        style="scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none;"
                        id="bioContainer"
                    >
                        <p class="text-lg xl:text-2xl leading-relaxed">{!! $topBio !!}</p>
                    </div>

                    <!-- Hide the scrollbar -->
                    <style>
                        .overflow-y-auto::-webkit-scrollbar {
                            display: none;
                        }
                    </style>

                    <!-- Fade effect at the bottom (visible on tablet and desktop only) -->
                    <div
                        id="fadeEffect"
                        class="hidden xl:block absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-background to-transparent pointer-events-none"
                    ></div>
                </div>
            </div>
        </div>
    </div>
@endsection
