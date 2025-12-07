@props(['customization'])

<div class="container mt-14 max-lg:px-8 max-sm:mt-8">
    <div class="grid gap-4">
        @foreach ($customization->options['column_1'] ?? [] as $link)
            <a href="{{ $link['url'] ?? '#' }}" class="text-blue-600 hover:underline">
                {{ $link['title'] ?? 'Link' }}
            </a>
        @endforeach
    </div>
</div>
