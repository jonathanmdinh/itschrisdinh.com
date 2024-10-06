<footer class="content-info mt-36 mb-8">
    <!-- White line centered and 3/4 of the screen width -->
    <div class="mx-auto my-8 w-3/4 border-t border-white"></div>

    <!-- Footer content constrained within the same width as the line -->
    <div class="mx-auto w-3/4 flex flex-col md:flex-row justify-between items-center text-white space-y-4 md:space-y-0">
      <!-- Phone Number (Left) -->
      <div class="w-full md:w-auto text-center md:text-left">
        @if(is_string($contactInformation['contact__phone-number']))
          <span>{{ $contactInformation['contact__phone-number'] }}</span>
        @endif
      </div>

      <!-- Instagram Logo (Center) -->
      <div class="w-auto text-center">
        @if(isset($contactInformation['contact__instagram-link']['url']))
          <a href="{{ $contactInformation['contact__instagram-link']['url'] }}" target="_blank" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
              <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
              <path d="M16.5 7.5l0 .01" />
            </svg>
          </a>
        @endif
      </div>

      <!-- Email Address (Right) -->
      <div class="w-full md:w-auto text-center md:text-right">
        @if(is_string($contactInformation['contact__email-address']))
          <a href="mailto:{{ $contactInformation['contact__email-address'] }}">{{ $contactInformation['contact__email-address'] }}</a>
        @endif
      </div>
    </div>
  </footer>
