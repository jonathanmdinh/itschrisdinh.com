<header class="banner relative">
    <a href="{{ home_url('/') }}"
       class="brand component font-logo text-3xl md:text-4xl text-white absolute top-8 left-10 lg:top-20 lg:left-24 z-10">
      Chris D.
    </a>

    <!-- Hamburger Menu Button -->
    <button id="hamburger" class="absolute top-8 right-10 lg:top-20 lg:right-24 z-30" aria-label="Open menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white">
            <circle cx="12" cy="12" r="11" fill="white" />
        </svg>
    </button>

    @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
    @endif

    <!-- Full-Screen Overlay of Hamburger Menu-->
    <div id="menuOverlay" class="fixed inset-0 bg-neutral-900 opacity-0 hidden transition-opacity duration-300 ease-in-out z-20">
        <div class="flex h-full flex-col-reverse lg:flex-row justify-between items-center">
            <!-- Menu Items -->
            <div class="menu-items w-full flex flex-col justify-end items-end p-4 text-white lg:w-1/2 lg:items-start lg:pl-48">
                <a href="{{ home_url('/') }}" class="mb-6 text-5xl md:text-8xl lg:text-5xl">Home</a>
                <a href="/work" class="mb-6 text-5xl md:text-8xl lg:text-5xl">Work</a>
                <a href="/blog" class="mb-6 text-5xl md:text-8xl lg:text-5xl">Blog</a>
                <a href="/about" class="mb-6 text-5xl md:text-8xl lg:text-5xl">About</a>
                <a href="/contact" class="mb-6 text-5xl md:text-8xl lg:text-5xl">Contact</a>
            </div>

            <!-- Contact Information / Figure out how this is in ui-sans-serif when not hard-coded as custom class-->
            <div class="contact-info w-full flex flex-col justify-start items-start p-4 pt-24 text-white whitespace-nowrap lg:w-1/2 lg:pr-48">
                <p class="mb-1 text-2xl md:text-4xl ">@itschrisdinh</p>
                <p class="mb-1 text-2xl md:text-4xl ">+1 (516) 582-3698</p>
                <p class="mb-1 text-2xl md:text-4xl ">itschrisdinh@gmail.com</p>
            </div>
        </div>
    </div>
</header>
