<header class="banner relative">
    <!-- Logo Link -->
    <a href="{{ home_url('/') }}"
       class="brand component font-logo text-3xl md:text-4xl lg:text-5xl text-white absolute top-8 left-10 lg:top-20 lg:left-24 z-10">
      Chris D.
    </a>

    <!-- Hamburger Menu Button -->
    <button id="hamburger" class="hamburger-button absolute top-8 right-10 lg:top-20 lg:right-24 z-30" aria-label="Open menu">
        <!-- SVG icon of white cirlce -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
            <circle cx="12" cy="12" r="11" fill="white" />
        </svg>
    </button>

    <!-- Primary Navigation -->
    @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
    @endif

    <!-- Full-Screen Overlay for Hamburger Menu -->
    <div id="menuOverlay" class="menu-overlay fixed inset-0 bg-neutral-900 opacity-0 hidden transition-opacity duration-300 ease-in-out z-20">
        <div class="menu-content flex h-full flex-col-reverse lg:flex-row justify-between items-center">

            <!-- Menu Items -->
            <div class="menu-items w-full flex flex-col justify-end items-end p-4 text-white lg:w-1/2 lg:items-start lg:pl-48">
                <!-- Loops through Menu items to map link to title -->
                @foreach([
                    '/' => 'Home',
                    '/work' => 'Work',
                    '/blog' => 'Blog',
                    '/about' => 'About',
                    '/contact' => 'Contact'] as $link => $title)
                    <a href="{{ home_url($link) }}" class="menu-item mb-6 text-5xl md:text-8xl lg:text-5xl">{{ $title }}</a>
                @endforeach
            </div>

            <!-- Contact Information -->
            <div class="contact-info w-full flex flex-col justify-start items-start p-4 pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48">
                <!-- If ACF fields are available, use those fields. Otherwise, default to values -->
                <p class="contact-detail mb-1 text-2xl md:text-4xl">{{ $social_media_handle ?? '@itschrisdinh' }}</p>
                <p class="contact-detail mb-1 text-2xl md:text-4xl">{{ $phone_number ?? '+1 (516) 582-3698' }}</p>
                <p class="contact-detail mb-1 text-2xl md:text-4xl">{{ $email_address ?? 'itschrisdinh@gmail.com' }}</p>
            </div>
        </div>
    </div>
</header>

