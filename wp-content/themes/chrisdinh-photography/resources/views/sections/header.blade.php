<header class="banner relative header max-w-7xl mx-auto px-5">
    <!-- Brand logo linking to the homepage -->
    <a href="{{ home_url('/') }}" class="header__website-logo brand component font-logo text-3xl md:text-4xl lg:text-5xl text-white absolute z-10 mt-[10px]">
        Chris D.
    </a>

    <!-- Circle SVG button for opening the navigation menu overlay -->
    <button id="hamburger" class="hamburger-button absolute z-50" aria-label="Open menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
            <circle cx="12" cy="12" r="11" fill="white" />
        </svg>
    </button>
</header>
@if ($menuItems)
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
                                @php
                                    $shouldOpenInNewTab = get_post_meta($menuItem->ID, '_menu_item_target', true);
                                @endphp
                                <li class="nav-item mb-6" data-image="{{ $menuItem->navigation_image }}">
                                    <a href="{{ $menuItem->url }}" class="inline-block text-5xl lg:text-5xl transition-transform duration-300 ease-in-out hover:scale-110"
                                    @if($shouldOpenInNewTab === '_blank') target="_blank" @endif>
                                        {{ $menuItem->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                    <div class="w-full flex flex-col justify-start items-start pl-6 pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48 z-20">
                        @if (!empty($contactInformation))
                            @php
                                $instagramLink = $contactInformation['contact__instagram-link'] ?? null;
                            @endphp

                            @if($instagramLink)
                                <a href="{{ $instagramLink['url'] }}" class="text-2xl md:text-4xl transition-transform duration-300 ease-in-out hover:scale-110"
                                target="{{ $instagramLink['target'] }}" rel="noopener noreferrer">
                                    {{ $instagramLink['title'] }}
                                </a>
                            @endif

                            <!-- Display the phone number -->
                            @if (!empty($contactInformation['contact__phone-number']))
                                <a href="tel:{{ $contactInformation['contact__phone-number'] }}" class="text-2xl md:text-4xl transition-transform duration-300 ease-in-out hover:scale-110">{{ $contactInformation['contact__phone-number'] }}</a>
                            @endif

                            <!-- Display the email address -->
                            @if (!empty($contactInformation['contact__email-address']))
                                <a href="mailto:{{ $contactInformation['contact__email-address'] }}" class="text-2xl md:text-4xl transition-transform duration-300 ease-in-out hover:scale-110">{{ $contactInformation['contact__email-address'] }}</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



