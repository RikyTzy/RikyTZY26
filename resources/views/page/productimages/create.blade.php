<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Add Product Image
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Upload new image for your product
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
                                Product Image
                            </span>

                            <h1 class="text-4xl font-black text-gray-900 dark:text-white mt-4">
                                Upload Product Image
                            </h1>

                            <p class="text-gray-600 dark:text-gray-300 mt-4 leading-relaxed">
                                Add beautiful images to make your product look more attractive and professional.
                            </p>
                        </div>

                        {{-- PREVIEW --}}
                        <div
                            class="rounded-3xl border border-dashed border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-6">

                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-5">
                                Image Preview
                            </p>

                            <div
                                class="flex items-center justify-center overflow-hidden rounded-3xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 h-[300px]">

                                <img id="preview-image" src="https://placehold.co/600x400?text=Preview"
                                    class="w-full h-full object-cover hidden">

                                <div id="preview-placeholder" class="text-center space-y-3">

                                    <div
                                        class="w-20 h-20 mx-auto rounded-3xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-4xl">
                                        🖼️
                                    </div>

                                    <div>
                                        <p class="font-semibold text-gray-700 dark:text-gray-200">
                                            No Image Selected
                                        </p>

                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Upload image to preview
                                        </p>
                                    </div>

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
                            Upload Information
                        </h3>

                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            Choose image file below
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

                    <form action="{{ route('product-images.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">

                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        {{-- FILE --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                                Upload Image
                            </label>

                            <label
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-3xl cursor-pointer bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">

                                <div class="flex flex-col items-center justify-center pt-5 pb-6">

                                    <div
                                        class="w-20 h-20 rounded-3xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-4xl mb-4">
                                        ⬆️
                                    </div>

                                    <p class="mb-2 text-sm text-gray-600 dark:text-gray-300">
                                        <span class="font-semibold">
                                            Click to upload
                                        </span>
                                        or drag and drop
                                    </p>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        PNG, JPG, JPEG
                                    </p>

                                </div>

                                <input id="image-input" type="file" name="image" accept="image/*" class="hidden">

                            </label>

                        </div>

                        {{-- BUTTON --}}
                        <div class="flex flex-wrap gap-4 pt-4">

                            <button type="submit"
                                class="group inline-flex items-center gap-3 rounded-2xl bg-blue-600 hover:bg-blue-700 px-7 py-4 text-white font-semibold shadow-lg hover:scale-105 transition-all duration-300">

                                <div
                                    class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:rotate-12 transition">
                                    ⬆️
                                </div>

                                Upload Image
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

    {{-- IMAGE PREVIEW --}}
    <script>
    const imageInput = document.getElementById('image-input');
    const previewImage = document.getElementById('preview-image');
    const previewPlaceholder = document.getElementById('preview-placeholder');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewImage.classList.remove('hidden');
                previewPlaceholder.classList.add('hidden');
            }

            reader.readAsDataURL(file);
        }
    });
    </script>
</x-app-layout>