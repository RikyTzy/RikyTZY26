<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Add Product Size
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Add new size for your product
                </p>
            </div>

            <a href="{{ route('products.show', $product->id) }}"
                class="inline-flex items-center gap-2 rounded-2xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-5 py-3 text-sm font-semibold text-gray-700 dark:text-white shadow-sm hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300">

                ← Back
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 gap-8">

                {{-- LEFT SIDE --}}
                <div
                    class="rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl p-8">

                    <div class="space-y-6">

                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900/30 px-4 py-2 text-sm font-semibold text-blue-700 dark:text-blue-300">
                                Product Size
                            </span>

                            <h1 class="text-4xl font-black text-gray-900 dark:text-white mt-4">
                                Add New Size
                            </h1>

                            <p class="text-gray-600 dark:text-gray-300 mt-4 leading-relaxed">
                                Add product sizes like S, M, L, XL with clean and modern interface.
                            </p>
                        </div>

                        {{-- PREVIEW --}}
                        <div
                            class="rounded-3xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-6">

                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-5">
                                Live Preview
                            </p>

                            <div class="flex items-center gap-5">

                                <div
                                    class="w-24 h-24 rounded-3xl bg-blue-600 flex items-center justify-center shadow-xl">

                                    <span id="preview-size" class="text-3xl font-black text-white">
                                        XL
                                    </span>

                                </div>

                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                        Product Size
                                    </h3>

                                    <p class="text-gray-500 dark:text-gray-400 mt-1">
                                        Preview selected size
                                    </p>
                                </div>

                            </div>
                        </div>

                        {{-- PRODUCT INFO --}}
                        <div
                            class="rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-5">

                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                Product
                            </p>

                            <h3 class="font-bold text-gray-900 dark:text-white">
                                {{ $product->name ?? 'Product' }}
                            </h3>
                        </div>

                    </div>
                </div>

                {{-- FORM --}}
                <div
                    class="rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl p-8">

                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Size Information
                        </h3>

                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            Fill in the size details below
                        </p>
                    </div>

                    {{-- ERROR --}}
                    @if ($errors->any())
                    <div
                        class="mb-6 rounded-2xl border border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/20 p-5">

                        <h4 class="font-semibold text-red-700 dark:text-red-300 mb-3">
                            Validation Error
                        </h4>

                        <ul class="space-y-1 text-sm text-red-600 dark:text-red-300">
                            @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                    @endif

                    <form action="{{ route('product-size.store') }}" method="POST" class="space-y-6">

                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        {{-- SIZE --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                                Size Name
                            </label>

                            <input type="text" id="size-input" name="size_name" placeholder="S / M / L / XL" required
                                class="w-full rounded-2xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-5 py-4 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 dark:focus:ring-blue-900 outline-none transition-all duration-300">

                        </div>

                        <input type="hidden" name="stock" value="0">

                        {{-- BUTTON --}}
                        <div class="flex flex-wrap gap-4 pt-4">

                            <button type="submit"
                                class="group inline-flex items-center gap-3 rounded-2xl bg-blue-600 hover:bg-blue-700 px-7 py-4 text-white font-semibold shadow-lg hover:scale-105 transition-all duration-300">

                                <div
                                    class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:rotate-12 transition">
                                    💾
                                </div>

                                Save Size
                            </button>

                            <a href="{{ route('products.show', $product->id) }}"
                                class="group inline-flex items-center gap-3 rounded-2xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-7 py-4 text-gray-700 dark:text-white font-semibold hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">

                                <div
                                    class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                    ←
                                </div>

                                Cancel
                            </a>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- LIVE PREVIEW --}}
    <script>
    const sizeInput = document.getElementById('size-input');
    const previewSize = document.getElementById('preview-size');

    sizeInput.addEventListener('input', () => {
        previewSize.innerText = sizeInput.value || 'XL';
    });
    </script>
</x-app-layout>