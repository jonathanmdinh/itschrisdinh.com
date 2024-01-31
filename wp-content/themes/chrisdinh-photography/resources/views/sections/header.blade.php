<header class="banner relative">
    <!-- Logo Link -->
    <a href="{{ home_url('/') }}"
       class="brand component font-logo text-3xl md:text-4xl lg:text-5xl text-white absolute top-8 left-10 md:top-20 md:left-24 z-10">
      Chris D.
    </a>

    <!-- Primary Navigation -->
    @if (has_nav_menu('primary_navigation'))
        <!-- Hamburger Menu Button -->
        <button id="hamburger" class="hamburger-button absolute top-8 right-10 md:top-20 md:right-24 z-30" aria-label="Open menu">
            <!-- SVG icon of white cirlce -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
                <circle cx="12" cy="12" r="11" fill="white" />
            </svg>
        </button>
        <!-- Full-Screen Overlay for Hamburger Menu -->
        <div id="menuOverlay" class="menu-overlay fixed inset-0 bg-neutral-900 opacity-0 hidden transition-opacity duration-300 ease-in-out z-20">
            <div class="menu-content flex h-full flex-col-reverse lg:flex-row justify-between items-center">
                <!-- Menu items are stylized in _header.scss -->
                <nav class="nav-primary w-full flex flex-col justify-end items-end p-4 text-white lg:w-1/2 lg:justify-start lg:items-start lg:pl-48" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'nav-list flex flex-col w-full items-end lg:items-start',
                        'echo' => false,
                        'fallback_cb' => false // No fallback to wp_page_menu()
                    ]) !!}
                </nav>

                <!-- Contact Information -->
                <div class="contact-info w-full flex flex-col justify-start items-start p-4 pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48">
                    <!-- If ACF fields are available, use those fields. otherwise, default to values -->
                    <p class="contact-detail mb-1 text-2xl md:text-4xl">{{ $social_media_handle ?? '@itschrisdinh' }}</p>
                    <p class="contact-detail mb-1 text-2xl md:text-4xl">{{ $phone_number ?? '+1 (516) 582-3698' }}</p>
                    <p class="contact-detail mb-1 text-2xl md:text-4xl">{{ $email_address ?? 'itschrisdinh@gmail.com' }}</p>
                </div>
            </div>
        </div>
    @endif
</header>

