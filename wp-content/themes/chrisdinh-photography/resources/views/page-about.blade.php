@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center px-4" style="height: calc(100vh - 150px);">
        <div class="max-w-[75%] w-full p-16 flex gap-24">
            <!-- Profile Picture -->
            <div class="flex-shrink-0 self-center"> <!-- Center the image -->
                <img
                    src="{{ $profilePicture['url'] }}"
                    alt="{{ $profilePicture['alt'] ?? 'Profile Picture' }}"
                    class="aspect-square w-[500px] h-[500px] rounded-full object-cover"
                >
            </div>

            <!-- Content -->
            <div class="flex-grow text-white">
                <!-- Name and Occupation -->
                <div class="text-center">
                    <h1 class="text-6xl font-bold">{{ $biographicalInformation['about__full-name'] }}</h1>
                    <p class="text-2xl mt-4">{{ $biographicalInformation['about__occupation'] }}</p>
                </div>

                <!-- Top Bio -->
                <div class="mt-12 relative max-h-[500px]">
                    <!-- Scrollable Content -->
                    <div
                        class="overflow-y-auto max-h-[500px] pr-4"
                        style="scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none;"
                        id="bioContainer"
                    >
                        <p class="text-2xl leading-relaxed">{!! $topBio !!}</p>
                    </div>

                    <!-- Hide the scrollbar -->
                    <style>
                        .overflow-y-auto::-webkit-scrollbar {
                            display: none;
                        }
                    </style>

                    <!-- Fade effect at the bottom -->
                    <div
                        id="fadeEffect"
                        class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-background to-transparent pointer-events-none hidden"
                    ></div>
                </div>
            </div>
        </div>
    </div>
@endsection
