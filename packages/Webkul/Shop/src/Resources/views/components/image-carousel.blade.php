@props(['customization'])

<div class="container mt-14 max-lg:px-8 max-sm:mt-8">
    <div class="shimmer-carousel-container overflow-hidden rounded-xl">
        @foreach ($customization->options['images'] ?? [] as $image)
            <a href="{{ $image['link'] ?? '#' }}" aria-label="Banner">
                <img
                    class="aspect-[2.76/1]"
                    src="{{ Storage::url($image['image']) }}"
                    alt="{{ $image['title'] ?? 'Banner' }}"
                    width="1440"
                    height="520"
                />
            </a>
        @endforeach
    </div>
</div>
