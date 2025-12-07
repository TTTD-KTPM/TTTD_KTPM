@props(['customization'])

<div class="container mt-14 max-lg:px-8 max-sm:mt-8">
    <div class="grid gap-4">
        <h2 class="text-3xl font-bold">
            {{ $customization->name }}
        </h2>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
            <!-- Products will be loaded here -->
            <p class="col-span-full text-center">No products available</p>
        </div>
    </div>
</div>
