<gallery-collections>
    <div class="gallery-collections block relative max-w-4xl mx-auto pb-5 lg:py-7 text-left">
        <p class="gallery-collections__description mb-4 text-grey tracking-[2px]">Use the filters below to sort the images. Click on an image to take a closer look.</p>
        @unless ( empty($terms) )
            <button class="gallery-collections__collection gallery-collections__collection--all gallery-collections__collection--active hover:opacity-75 transition-all pb-1 border-b border-solid text-xl leading-none mb-2 tracking-[2px]" data-term-slug="all" aria-label="Filter the gallery images to see all images part of any collection.">Show All</button>
            @foreach ($terms as $term)
                <button class="gallery-collections__collection hover:opacity-75 transition-all pb-1 border-b border-solid border-b-transparent text-xl leading-none mb-2 tracking-[2px]" data-term-slug="{{ $term->slug }}" data-term-id="{{ $term->term_id }}" aria-label="Filter the gallery images to see images part of the {{ $term->slug }} collection.">{{ $term->name }}</button>
            @endforeach
        @endunless
    </div>
</gallery-collections>
