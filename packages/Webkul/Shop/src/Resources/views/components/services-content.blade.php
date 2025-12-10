@props(['customization'])

<div class="container mt-14 max-lg:px-8 max-sm:mt-8">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
        @foreach ($customization->options['services'] ?? [] as $service)
            <div class="text-center">
                <h3 class="font-bold">{{ $service['title'] ?? '' }}</h3>
                <p>{{ $service['description'] ?? '' }}</p>
            </div>
        @endforeach
    </div>
</div>
