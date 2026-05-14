<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data"
                        id="categoriesForm">
                        @csrf
                        <div class="p-1 rounded-xl">
                            <div class="mb-4">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                    <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Nama disini ..."
                                    oninput="this.value = this.value.toUpperCase();" />
                            </div>
                            <button type="submit" class="flex bg-sky-200 hover:bg-sky-700 hover:bg-sky-500 text-sky-600 hover:text-white inline-flex rounded-full">
                                <div>
                                    <div
                                        class="flex items-center justify-between font-medium rounded-full pl-6 pr-2 py-2 text-xs transition-all duration-300">
                                        <span>Simpan</span>
                                    </div>
                                </div>
                                <div class="bg-sky-100 text-sky-600 w-8 h-8 items-center justify-center flex rounded-full">
                                    <i class="fi fi-sr-disk text-sm mt-1"></i>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>