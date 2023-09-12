<gallery-collections>
    <div class="gallery-collections block relative max-w-4xl mx-auto py-7 px-5">
        @unless ( empty($terms) )
            @foreach ($terms as $term)
                <button class="gallery-collections__collection" aria-label="Filter the gallery images to see images part of the {{ $term->slug }} collection.">{{ $term->name }}</button>
            @endforeach
        @endunless
    </div>
</gallery-collections>
