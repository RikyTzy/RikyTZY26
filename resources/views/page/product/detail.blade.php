<x-app-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- HERO --}}
            <div
                class="relative overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-8 shadow-2xl">

                <div class="relative z-10 flex flex-col lg:flex-row gap-8 items-center">

                    {{-- IMAGE --}}
                    <div x-data="{
                        activeImage: '{{ $product->images->count()
                            ? asset('storage/' . (
                                optional($product->images->where('is_primary', true)->first())->image_url
                                ?? $product->images->first()->image_url
                            ))
                            : 'https://placehold.co/600x400?text=No+Image'
                        }}'
                    }" class="w-full lg:w-1/2 space-y-4">

                        {{-- MAIN IMAGE --}}
                        <div
                            class="overflow-hidden rounded-3xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 shadow-xl">

                            <img :src="activeImage"
                                class="w-full h-[450px] object-cover hover:scale-105 transition duration-500">
                        </div>

                        {{-- THUMBNAILS --}}
                        <div class="flex flex-wrap gap-3 justify-center lg:justify-start">

                            @foreach ($product->images as $index => $img)

                            @php
                            $url = asset('storage/' . $img->image_url);
                            @endphp

                            <button type="button" @click="activeImage = '{{ $url }}'"
                                class="group relative overflow-hidden rounded-2xl border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-1 transition-all duration-300 hover:scale-105"
                                :class="activeImage === '{{ $url }}'
                                        ? '!border-blue-500 shadow-xl scale-105'
                                        : ''">

                                <img src="{{ $url }}"
                                    class="w-16 h-16 object-cover rounded-xl opacity-80 group-hover:opacity-100">

                            </button>

                            @endforeach

                        </div>
                    </div>

                    {{-- PRODUCT INFO --}}
                    <div class="flex-1 text-gray-900 dark:text-white space-y-6">

                        {{-- BRAND --}}
                        @if(isset($product) && $product->brand && $product->brand->logo)

                        <div class="flex items-center gap-4">

                            <div
                                class="w-20 h-20 rounded-2xl overflow-hidden bg-white shadow-lg border border-gray-200 dark:border-gray-700">

                                <img src="{{ asset('logo/' . $product->brand->logo) }}"
                                    alt="{{ $product->brand->name }}" class="w-full h-full object-cover">

                            </div>

                            <div>
                                <p class="text-sm uppercase tracking-widest text-gray-500 dark:text-gray-400">
                                    Brand
                                </p>

                                <h2 class="text-2xl font-bold">
                                    {{ $product->brand->name }}
                                </h2>
                            </div>

                        </div>

                        @endif

                        {{-- PRODUCT --}}
                        <div class="space-y-4">

                            <h1 class="text-4xl lg:text-5xl font-black leading-tight">
                                {{ $product->name }}
                            </h1>

                            <div class="flex flex-wrap items-center gap-4">

                                <span
                                    class="inline-flex items-center rounded-2xl bg-blue-600 px-6 py-3 text-2xl font-bold text-white shadow-lg">

                                    Rp {{ number_format($product->base_price, 0, ',', '.') }}

                                </span>

                                <span
                                    class="rounded-2xl bg-emerald-100 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 px-4 py-2 text-sm font-semibold text-emerald-700 dark:text-emerald-300">

                                    Available Product

                                </span>

                            </div>

                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg max-w-2xl">
                                {{ $product->description }}
                            </p>

                        </div>

                        {{-- CATEGORY --}}
                        <div class="grid sm:grid-cols-2 gap-4 pt-4">

                            <div
                                class="rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-5 shadow-lg">

                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                    Category
                                </p>

                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $product->category->name ?? '-' }}
                                </h3>

                            </div>

                            <div
                                class="rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-5 shadow-lg">

                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                    Total Variants
                                </p>

                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $product->variants->count() }}
                                </h3>

                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="flex flex-wrap gap-4 pt-6">

                            {{-- ADD VARIANT --}}
                            <a href="{{ route('product-variant.create', ['product_id' => $product->id]) }}"
                                class="group inline-flex items-center gap-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 font-semibold shadow-xl hover:scale-105 transition-all duration-300">

                                <div
                                    class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:rotate-12 transition">

                                    +

                                </div>

                                Add Variant

                            </a>

                            {{-- ADD SIZE --}}
                            <a href="{{ route('product-size.create', ['product_id' => $product->id]) }}"
                                class="group inline-flex items-center gap-3 rounded-2xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-6 py-4 font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">

                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center group-hover:rotate-12 transition">

                                    +

                                </div>

                                Add Size

                            </a>

                            {{-- ADD IMAGE --}}
                            <a href="{{ route('product-images.create', ['product_id' => $product->id]) }}"
                                class="group inline-flex items-center gap-3 rounded-2xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-6 py-4 font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">

                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center group-hover:rotate-12 transition">

                                    +

                                </div>

                                Add Image

                            </a>

                        </div>

                    </div>
                </div>
            </div>

            {{-- DETAILS --}}
            <div class="grid lg:grid-cols-2 gap-8">

                {{-- SIZES --}}
                <div
                    class="rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl p-8">

                    <div class="flex items-center justify-between mb-6">

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Available Sizes
                        </h2>

                        <div
                            class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center text-blue-600 font-bold">

                            {{ $product->sizes->count() }}

                        </div>

                    </div>

                    <div class="flex flex-wrap gap-4">

                        @forelse ($product->sizes ?? [] as $size)

                        <div
                            class="group rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-6 py-4 hover:border-blue-500 hover:shadow-lg transition-all duration-300">

                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                {{ $size->size_name }}
                            </p>

                        </div>

                        @empty

                        <div
                            class="w-full rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 p-8 text-center">

                            <p class="text-gray-500 dark:text-gray-400">
                                No sizes added
                            </p>

                        </div>

                        @endforelse

                    </div>
                </div>

                {{-- VARIANTS --}}
                <div
                    class="rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl p-8">

                    <div class="flex items-center justify-between mb-6">

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Product Variants
                        </h2>

                        <div
                            class="w-12 h-12 rounded-2xl bg-purple-100 dark:bg-purple-900/40 flex items-center justify-center text-purple-600 font-bold">

                            {{ $product->variants->count() }}

                        </div>

                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">

                        @forelse ($product->variants as $variant)

                        <div
                            class="group rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-5 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                            <div class="flex items-center gap-4">

                                <div class="relative">

                                    <div class="w-14 h-14 rounded-2xl shadow-lg border-4 border-white"
                                        style="background-color: {{ $variant->color_code ?? '#000000' }};">
                                    </div>

                                </div>

                                <div class="space-y-1">

                                    <h3 class="font-bold text-lg text-gray-900 dark:text-white">
                                        {{ $variant->color_name }}
                                    </h3>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $variant->color_code }}
                                    </p>

                                </div>

                            </div>
                        </div>

                        @empty

                        <div
                            class="col-span-full rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 p-8 text-center">

                            <p class="text-gray-500 dark:text-gray-400">
                                No variants available
                            </p>

                        </div>

                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>