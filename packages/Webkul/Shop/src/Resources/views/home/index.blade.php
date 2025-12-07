<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="{{ core()->getCurrentChannel()->home_seo['meta_description'] ?? '' }}"/>

    <meta name="keywords" content="{{ core()->getCurrentChannel()->home_seo['meta_keywords'] ?? '' }}"/>
@endPush

<!-- Page Title -->
<x-shop::layouts>
    <x-slot:title>
        {{ core()->getCurrentChannel()->home_seo['meta_title'] ?? config('app.name') }}
    </x-slot>

    <!-- Page Content -->
    <div class="container mt-8 px-[60px] max-lg:px-8">
        <!-- Customizations -->
        @foreach ($customizations as $customization)
            <x-shop::{{ $customization->type }} :customization="$customization" />
        @endforeach
    </div>
</x-shop::layouts>
