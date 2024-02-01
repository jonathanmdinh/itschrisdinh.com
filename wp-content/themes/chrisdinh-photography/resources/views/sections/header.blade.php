@php
// Fetch the menu items from the 'primary_navigation' menu if it exists, otherwise set to an empty array
$menuItems = has_nav_menu('primary_navigation') ? wp_get_nav_menu_items('primary_navigation') : [];
@endphp

<header class="banner relative">
    <!-- Brand logo linking to the homepage -->
    <a href="{{ home_url('/') }}" class="brand component font-logo text-3xl md:text-4xl lg:text-5xl text-white absolute top-8 left-10 md:top-20 md:left-24 z-10">
        Chris D.
    </a>

    @if ($menuItems)
        <!-- Hamburger button for opening the menu overlay -->
        <button id="hamburger" class="hamburger-button absolute top-8 right-10 md:top-20 md:right-24 z-30" aria-label="Open menu">
            <!-- Icon for the hamburger button -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
                <circle cx="12" cy="12" r="11" fill="white" />
            </svg>
        </button>

        <!-- Full-screen menu overlay, hidden by default -->
        <div id="menuOverlay" class="fixed inset-0 bg-neutral-900 opacity-0 hidden transition-opacity duration-300 ease-in-out z-10 bg-cover bg-center">
            <!-- Background container for potentially adding images -->
            <div id="backgroundImageContainer" class="fixed inset-0 bg-cover bg-center opacity-0 transition-opacity duration-300 ease-in-out z-0"></div>
                <div class="flex h-full flex-col-reverse lg:flex-row justify-between items-center">
                    <!-- Navigation menu -->
                    <nav class="w-full flex flex-col justify-end items-end p-4 text-white lg:w-1/2 lg:justify-start lg:items-start lg:pl-48 z-20" aria-label="Primary Navigation">
                        <ul class="flex flex-col w-full items-end lg:items-start">
                            @foreach ($menuItems as $menuItem)
                                @php
                                    // Retrieve custom fields for each menu item, if available
                                    $navigation_image = get_field('navigation__image', $menuItem);
                                    $image_mobile = $navigation_image['navigation__item-image-mobile'] ?? '';
                                    $image_desktop = $navigation_image['navigation__item-image-desktop'] ?? '';
                                @endphp
                                <!-- Menu item with dynamic images for mobile and desktop -->
                                <li class="nav-item mb-6" data-image-mobile="{{ $image_mobile }}" data-image-desktop="{{ $image_desktop }}">
                                    <a href="{{ $menuItem->url }}" class="text-5xl hover:text-6xl lg:text-5xl">
                                        {{ $menuItem->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>

                    <!-- Contact information section -->
                    <div class="w-full flex flex-col justify-start items-start p-4 pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48 z-20">
                        <!-- Displaying social media handle, phone number, and email with defaults -->
                        <p class="text-2xl md:text-4xl">{{ $social_media_handle ?? '@itschrisdinh' }}</p>
                        <p class="text-2xl md:text-4xl">{{ $phone_number ?? '+1 (516) 582-3698' }}</p>
                        <p class="text-2xl md:text-4xl">{{ $email_address ?? 'itschrisdinh@gmail.com' }}</p>
                    </div>
            </div>
        </div>
    @endif
</header>
