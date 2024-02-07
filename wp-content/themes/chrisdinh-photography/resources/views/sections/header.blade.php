<header class="banner relative">
    <!-- Brand logo linking to the homepage -->
    <a href="{{ home_url('/') }}" class="brand component font-logo text-3xl md:text-4xl lg:text-5xl text-white absolute top-8 left-10 md:top-20 md:left-24 z-10">
        Chris D.
    </a>

    @if ($menuItems)
    <!-- Circle SVG button for opening the navigation menu overlay -->
        <button id="hamburger" class="hamburger-button absolute top-8 right-10 md:top-20 md:right-24 z-50" aria-label="Open menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
                <circle cx="12" cy="12" r="11" fill="white" />
            </svg>
        </button>

        <!-- Full-screen menu overlay, hidden by default -->
        <div id="menuOverlay" class="fixed inset-0 bg-neutral-900 opacity-0 hidden transition-opacity duration-175 ease-in-out z-40 bg-cover bg-center">
            <!-- Container for the background image and its effects -->
            <div id="backgroundImageContainer" class="fixed inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000 ease-in-out z-0"></div>
                <div id="backgroundImageContainer2" class="fixed inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000 ease-in-out z-0"></div>
                    <!-- Navigation Menu -->
                    <div class="flex h-full flex-col-reverse lg:flex-row justify-between items-center z">
                        <nav class="w-full flex flex-col justify-end items-end text-white lg:w-1/2 lg:justify-start lg:items-start lg:pl-48 z-20" aria-label="Primary Navigation">
                            <ul class="flex flex-col w-full items-end pr-6 lg:items-start">
                                @foreach ($menuItems as $menuItem)
                                    <!-- Menu item with dynamic images for mobile and desktop -->
                                    <li class="nav-item mb-6" data-image="{{ $menuItem->navigation_image }}">
                                        <a href="{{ $menuItem->url }}" class="inline-block text-5xl lg:text-5xl transition-transform duration-300 ease-in-out hover:scale-110 {{ $menuItem->target === '_blank' ? 'target=_blank' : '' }}" rel="{{ $menuItem->target === '_blank' ? 'noopener noreferrer' : '' }}">
                                            {{ $menuItem->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>

                        <!-- Contect Information section -->
                        <div class="w-full flex flex-col justify-start items-start pl-6 pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48 z-20">
                            <!-- Displaying contact information using ACF fields, resorts to default values if unavailable -->
                            <a href="https://www.instagram.com/itschrisdinh/" class="text-2xl md:text-4xl">{{ $social_media_handle ?? '@itschrisdinh' }}</a>
                            <a href="tel:+15165823698" class="text-2xl md:text-4xl">{{ $phone_number ?? '+1 (516) 582-3698' }}</a>
                            <a href="mailto:itschrisdinh@gmail.com" class="text-2xl md:text-4xl">{{ $email_address ?? 'itschrisdinh@gmail.com' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</header>


