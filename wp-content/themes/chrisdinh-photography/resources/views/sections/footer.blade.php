<footer class="content-info mt-36 mb-8 relative max-w-7xl mx-auto px-5 {{ $footerClasses }}">
    <!-- White line centered with consistent width and padding -->
    <div class="mx-auto my-6 md:my-8  border-t border-white w-full"></div>

    <!-- Footer content -->
    <div class="relative mx-auto w-full flex flex-row justify-between items-center text-white space-y-0">
        <!-- Phone Number (Left) -->
        @if($phoneNumber)
            <div class="w-full md:w-auto flex items-center">
                <a href="tel:{{ $phoneNumber }}" class="flex items-center justify-center transition-transform duration-300 ease-in-out hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone md:hidden" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                    </svg>
                    <span class="hidden md:block">{{ $phoneNumber }}</span>
                </a>
            </div>
        @endif

        <!-- Instagram Logo (Center) -->
        @if($instagramLink)
            <div class="relative md:absolute md:left-1/2 md:transform md:-translate-x-1/2 text-center flex items-center">
                <a href="{{ $instagramLink }}" target="_blank" aria-label="Open Instagram link" class="flex items-center justify-center transition-transform duration-300 ease-in-out hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                    </svg>
                </a>
            </div>
        @endif

        <!-- Email Address (Right) -->
        @if($emailAddress)
            <div class="w-full md:w-auto flex items-center justify-end ml-auto">
                <a href="mailto:{{ $emailAddress }}" class="flex items-center justify-center transition-transform duration-300 ease-in-out hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail md:hidden" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                        <path d="M3 7l9 6l9 -6" />
                    </svg>
                    <span class="hidden md:block">{{ $emailAddress }}</span>
                </a>
            </div>
        @endif
    </div>
</footer>
