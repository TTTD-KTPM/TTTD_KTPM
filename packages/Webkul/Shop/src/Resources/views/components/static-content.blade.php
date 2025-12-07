@props(['customization'])

<div class="container mt-14 max-lg:px-8 max-sm:mt-8">
    <div class="prose max-w-none">
        {!! $customization->options['html'] ?? '' !!}
    </div>
</div>
