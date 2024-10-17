<article @php(post_class())>
  <header class="max-w-7xl mx-auto px-5">

    @unless ( empty($featuredImage))
        <div class="blog-image-container max-w-7xl w-full pb-10 mx-auto">
            <image src="{{ $featuredImage[0] }}" alt="" class="blog-featured-image w-full h-auto" />
        </div>
    @endunless

    <h1 class="entry-title font-neueHaas pb-5">
      {!! $title !!}
    </h1>
  </header>

  <div class="entry-content max-w-7xl mx-auto px-5 flex flex-col lg:flex-row">
    <div class="content basis-full lg:basis-3/4 pb-5 lg:pr-10">
        @php(the_content())
    </div>
    <div class="other-articles basis-full lg:basis-1/4 border-t lg:border-l lg:border-t-0 border-white border-solid pt-5 lg:pt-0 lg:pl-10">
        @unless ( empty($relatedArticles['allPosts']) )
            <h3 class="font-neueHaas pb-5">Related Articles</h3>

            @foreach ($relatedArticles['allPosts'] as $post)
                @if ($post->post_status === 'publish')
                    <a class="text-white block text-[16px] leading-1 ml-2.5 mb-2.5 transition-all duration-300 hover:scale-105" href="{{ get_the_permalink($post->ID) }}">{{ $post->post_title }}</a>
                @endif
            @endforeach
        @endunless
    </div>
  </div>
</article>
