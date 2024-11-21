@extends('layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row items-center justify-center px-4" style="min-height: calc(100vh - 150px);">
        <div class="lg:max-w-[75%] w-full p-8 lg:p-16 flex flex-col lg:flex-row gap-8 lg:gap-24">
            <!-- Profile Picture -->
            <div class="flex-shrink-0 self-center">
                <img
                    src="{{ $profilePicture['url'] }}"
                    alt="{{ $profilePicture['alt'] ?? 'Profile Picture' }}"
                    class="aspect-square w-[300px] h-[300px] lg:w-[500px] lg:h-[500px] rounded-full object-cover"
                >
            </div>

            <!-- Content -->
            <div class="flex-grow text-white lg:text-left">
                <!-- Name and Occupation -->
                <div>
                    <h1 class="text-4xl lg:text-6xl font-bold">{{ $biographicalInformation['about__full-name'] }}</h1>
                    <p class="text-lg lg:text-2xl mt-2 lg:mt-4">{{ $biographicalInformation['about__occupation'] }}</p>
                </div>

                <!-- Top Bio -->
                <div class="mt-8 lg:mt-12 relative">
                    <!-- Scrollable Content -->
                    <div
                        class="overflow-visible lg:overflow-y-auto lg:max-h-[500px] lg:pr-4"
                        style="scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none;"
                        id="bioContainer"
                    >
                        <p class="text-lg lg:text-2xl leading-relaxed">{!! $topBio !!}</p>
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
                        class="hidden lg:block absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-background to-transparent pointer-events-none"
                    ></div>
                </div>
            </div>
        </div>
    </div>
@endsection
