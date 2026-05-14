<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Add Variant
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Add new product variant color
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
                                Product Variant
                            </span>

                            <h1 class="text-4xl font-black text-gray-900 dark:text-white mt-4">
                                Add New Variant
                            </h1>

                            <p class="text-gray-600 dark:text-gray-300 mt-4 leading-relaxed">
                                Create a clean and modern color variant for your product.
                            </p>
                        </div>

                        {{-- PREVIEW --}}
                        <div
                            class="rounded-3xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-6">

                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-5">
                                Live Preview
                            </p>

                            <div class="flex items-center gap-5">

                                <div id="preview-box"
                                    class="w-24 h-24 rounded-3xl border-4 border-white shadow-xl bg-black transition-all duration-300">
                                </div>

                                <div>
                                    <h3 id="preview-name" class="text-2xl font-bold text-gray-900 dark:text-white">
                                        BLACK
                                    </h3>

                                    <p id="preview-code" class="text-gray-500 dark:text-gray-400 mt-1">
                                        #000000
                                    </p>
                                </div>

                            </div>
                        </div>

                        {{-- PRODUCT INFO --}}
                        <div class="grid grid-cols-2 gap-4">

                            <div
                                class="rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-5">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                    Product
                                </p>

                                <h3 class="font-bold text-gray-900 dark:text-white">
                                    {{ $product->name ?? 'Product' }}
                                </h3>
                            </div>

                            <div
                                class="rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-5">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                    Variants
                                </p>

                                <h3 class="font-bold text-gray-900 dark:text-white">
                                    {{ $product->variants->count() ?? 0 }}
                                </h3>
                            </div>

                        </div>

                    </div>
                </div>

                {{-- FORM --}}
                <div
                    class="rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl p-8">

                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Variant Information
                        </h3>

                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            Fill in the variant details below
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

                    <form action="{{ route('product-variant.store') }}" method="POST" class="space-y-6">

                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id ?? request('product_id') }}">

                        {{-- COLOR --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                                Color Name
                            </label>

                            <input type="text" id="color-name" name="color" required placeholder="BLACK / WHITE / RED"
                                class="w-full rounded-2xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-5 py-4 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 dark:focus:ring-blue-900 outline-none transition-all duration-300">
                        </div>

                        {{-- COLOR CODE --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                                Color Code
                            </label>

                            <div class="flex gap-4">

                                <input type="color" id="color-picker" value="#000000"
                                    class="w-20 h-16 rounded-2xl border border-gray-300 dark:border-gray-700 cursor-pointer bg-transparent">

                                <input type="text" id="color-code" name="color_code" value="#000000"
                                    placeholder="#000000"
                                    class="flex-1 rounded-2xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-5 py-4 text-gray-900 dark:text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 dark:focus:ring-blue-900 outline-none transition-all duration-300">

                            </div>
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

                                Save Variant
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
    const colorName = document.getElementById('color-name');
    const colorCode = document.getElementById('color-code');
    const colorPicker = document.getElementById('color-picker');

    const previewBox = document.getElementById('preview-box');
    const previewName = document.getElementById('preview-name');
    const previewCode = document.getElementById('preview-code');

    colorName.addEventListener('input', () => {
        previewName.innerText = colorName.value || 'BLACK';
    });

    colorCode.addEventListener('input', () => {
        previewCode.innerText = colorCode.value || '#000000';
        previewBox.style.backgroundColor = colorCode.value;
        colorPicker.value = colorCode.value;
    });

    colorPicker.addEventListener('input', () => {
        colorCode.value = colorPicker.value;
        previewCode.innerText = picker.value;
        previewBox.style.backgroundColor = picker.value;
    });
    </script>
</x-app-layout>